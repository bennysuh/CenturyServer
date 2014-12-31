<?php
/**
 * @author WanBin @date 2013-08-03
 * 微信用户表
 * 单记录与多记录同时存在在本类中，需要根据实际情况进行修改
 * 都写为受保护的方法，实际使用时要手动修改
 */
require_once PATH_MODEL . 'WXModel.php';
class WXCache extends WXModel{
	public function getMessageCount($msg) {
		$rediska = new Rediska ();
		$list = new Rediska_Key_SortedSet ( "wx_message_send_count" );
		$list->incrementScore ( $msg, 1 );
		return $list->getScore ( $msg );
	}
	
	protected function getMessageList() {
		$rediska = new Rediska ();
		$list = new Rediska_Key_SortedSet ( "wx_message_send_count" );
		$ret= $list->getByRank(true,0,100,true,false);
		$result=array();
		$rank=1;
		foreach ($ret as $key=>$value){
			$result[]=array('value'=>$value['value'],'score'=>$value['score'],'rank'=>$rank);
			$rank++;
		}
		return $result;
	}
	protected function delKey($key){
		$rediska = new Rediska ();
		$list = new Rediska_Key_SortedSet ( "wx_message_send_count" );
		$list->remove($key);
	}
	
	
	protected function getReturn($keyword) {
		$key="WX_KEY_".$keyword;
		$ret=$this->getFromCache($key);
		if (empty ( $ret )) {
			$ret = parent::getReturnFromMongo ( $keyword );
			$this->setToCache ( $key, $ret, 60 );
		}
		//如果数据库中也没有，那么加个返回未的提示
		if (empty ( $ret )) {
			$msgCount = $this->getMessageCount ($keyword);
			if ($msgCount > 1) {
				$ret = "[得意]你是本游戏中第【 $msgCount 】位用户发送这条信息了！这或许就是缘分吧，虽然小编一时半会回答不了你的问题，但相信您一定会在游戏中找到乐趣的~\n===============\n先发个游戏帮助，您先看着，看有需要的内容吗\n================\n";
			} else {
				$ret = "[可怜]小编找遍了所有用户发来的信息，没有发和和你这条重复的，不知如何是好,又要挨骂了~~\n================\n先发个游戏帮助，您先看着，看有需要的内容吗？\n================\n";
			}
		}
		return $ret;
	}
	protected function delReturn($keyword) {
		$key = "WX_KEY_" . $keyword;
		$this->delFromCache ( $key );
		return parent::delReturn ( $keyword );
	}
	protected function updateReturn($keyword,$content) {
		$key = "WX_KEY_" . $keyword;
		$this->delFromCache ( $key );
		return parent::updateReturn ( $keyword ,$content);
	}
	protected function newReturn($keyword, $content) {
		return parent::newReturn ( $keyword, $content );
	}
}