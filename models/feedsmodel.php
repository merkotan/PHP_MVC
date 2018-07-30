<?php
class FeedsModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getPageModel()
	{
		$nrows = $this->db->query('select count(*) from feeds')->fetchColumn(); // кол-во строк в feeds
		return $nrows;
	}

	public function getListModel($offset, $limit)
	{
		$sql = "SELECT feed, first_name FROM feeds, user WHERE feeds.user_id = user.id UNION 
		SELECT feed, name FROM feeds, guest WHERE feeds.guest_id = guest.id limit $offset, $limit";
		$query = $this->db->prepare($sql);
		$query->execute([$offset, $limit]);
		return $query->fetchAll();
	}
}
