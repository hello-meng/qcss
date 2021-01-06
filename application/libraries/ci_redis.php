<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*

$this->load->library('ci_redis', array('core' => 'cache'));

$this->ci_redis->get('test');

$this->ci_redis->get_key('te*');

$this->ci_redis->set('test', 1);
$this->ci_redis->set('test', 1, 300);

$this->ci_redis->increment('test');
$this->ci_redis->increment('test', 10);

$this->ci_redis->decrement('test');
$this->ci_redis->decrement('test', 5);

$this->ci_redis->delete('test');

review_stats_[id]
product_stats_[id]

array(
 'date' => '2020-09-14',
 'view_cnt_all' => 0,
 'view_cnt' => 0,
 'time' => [timstamp]
)

*/

class ci_redis {

    private $connection;

    function __construct($param)
    {
		if(@$param['core'] == '')
		{
			$param['core'] = 'cache';
		}
		
        $CI =& get_instance();
		
		$this->connection = new Redis();
		$this->connection->pconnect($CI->config->item('redis')[$param['core']]['host'], $CI->config->item('redis')[$param['core']]['port']);
	}
	
	public function set($key, $value, $expire = 0)
	{
		if($expire > 0)
		{
			return $this->connection->set($key, $value, $expire);
		}
		else
		{
			return $this->connection->set($key, $value);
		}
	}
	
	public function get($key)
	{
		return $this->connection->get($key);
	}
	
	public function get_key($keyword)
	{
		return $this->connection->keys($keyword);
	}
	
	public function increment($key, $value = 1)
	{
		return $this->connection->incr($key, $value);
	}
	
	public function decrement($key, $value = 1)
	{
		return $this->connection->decr($key, $value);
	}
	
	public function delete($key)
	{
		return $this->connection->del($key);
	}
}

/*
$stats = redis->get
if($stats != false)
{
 $stats_date = unserialrize($stats);
 
 $current_time = time();
 
 if(date('Y-m-d') != $stats_date['date'])
 {
  update stats date with redis data
  
  $stats = array(
   'date' => date('Y-m-d'),
   'view_cnt_all' => xx, (get all stats < today)
   'view_cnt' => 1,
   'time' => time()
  )
  
  redis->set($stats)
  
  insert stats date (current date)
 }
 else if($current_time - $stats_date['time'] > 300000) // 5 minutes
 {  
  $stats['view_cnt'] = $stats['view_cnt'] + 1;
  $stats['time'] = time();
  
  redis->set($stats)
  
  update stats date with redis data
  //update to db
 }
 else
 {
  $stats['view_cnt'] = $stats['view_cnt'] + 1;
  redis->set($stats)
 }
}
else
{
 select stats date where date = current date
 if(row count > 0)
 {
  $stats = array(
   'date' => date('Y-m-d'),
   'view_cnt_all' => xx, (get all stats < today)
   'view_cnt' => 1, (get all stats = today)
   'time' => time()
  )
  
  redis->set($stats)
 }
 else
 {
  insert stats date (current date)
  
  $stats = array(
   'date' => date('Y-m-d'),
   'view_cnt_all' => xx, (get all stats < today)
   'view_cnt' => 1,
   'time' => time()
  )
  
  redis->set($stats)
 }
}
*/ 

?>