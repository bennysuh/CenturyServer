<?php
/**
 * @author WanBin @date 2014-05-21
 * 游戏房间
 */
require_once PATH_MODEL.'BaseModel.php';
class RoomsModel extends BaseModel {
	
	protected function getInfo($roomid) {
		$where = array (
				'_id' => intval ( $roomid ) 
		);
		$ret = $this->getOneFromMongo ( $where, 'room' );
		return $ret;
	}
	
	protected  function NewRoom(){
		$content = array (
				'gameuid' => $this->gameuid,
				'maxcount' => 10 
		);
		$id = $this->insertMongo ( $content, 'room' );
		return $id;
		
	}
	//离开房间
	protected function LevelFromRoom($roomid) {
		$where = array (
				'gameuid' => $this->gameuid,
				'roomid'=>$roomid
		);
		return $this->removeMongo($where, 'user_room');
	}
		
		// 离开房间
	protected function removeRoom($roomid) {
		$where = array (
				'roomid' => $roomid 
		);
		return $this->removeMongo ( $where, 'user_room' );
	}
	
	
	protected function endAndUpdateRoomUser($roomid,$userList){
		$where = array (
				'_id' => $roomid
		);
		
		$content=array(
				'endtime'=>time(),
				'users'=>$userList
		);
		//这一块特殊处理，房间ID不可重复创建，把参与好友的信息存下
		return $this->updateMongo($content, $where, 'room');
	}
	
	
	
		
	protected function addToRoom($id){
		$content=array(
				'gameuid'=>$this->gameuid,
				'roomid'=>$id,
				'content'=>'已经加入游戏，还未开始'
				);
		
		$where = array (
				'gameuid' => $this->gameuid 
		);
		$this->removeMongo($where, 'user_room');
		return $this->insertMongo($content, 'user_room');
	}
	
	protected function getUserRoomInfo($gameuid){
		$where = array (
				'gameuid' => $gameuid
		);
		return $this->getOneFromMongo($where, 'user_room');
	}
	
	protected function setUserContent($gameuid,$content){
		$content=array(
				'updatetime'=>time(),
				'content'=>$content
				);
		$where = array (
				'gameuid' => $gameuid
		);
		return $this->updateMongo($content, $where, 'user_room');
	}
	
	
	
	protected  function removeUserRoomInfo($gameuid){
		$where = array (
				'gameuid' => $gameuid
		);
		return $this->removeMongo($where, 'user_room');
	}
	
	protected function setRoomType($roomid,$type,$content=''){
		$where = array (
				'_id' => $roomid
		);
		if ($type == 1) {
			$name = "谁是卧底";
		} else if ($type == 2) {
			$name = "杀人游戏";
		}
		$content=array(
				'name'=>$name,
				'updatetime'=>time(),
				'type'=>$type,
				);
		return $this->updateMongo($content, $where, 'room');
	}
	
	protected function GetRoomInfoOne($gameuid) {
		$where = array (
				'gameuid' => $gameuid
		);
		return $this->getOneFromMongo($where, 'user_room');
	}
}