<?php
class SaeMysql
{
	/**
	 * 构造函数
	 *  
	 * @param bool $do_replication 是否支持主从分离，true:支持，false:不支持，默认为true
	 * @return void
	 * @author EasyChen
	 */
	function __construct( $do_replication = true )
	{
		$this->port = '3306';//端口
		$this->host = '127.0.0.1';//主机
		$this->username = 'root' ;//用户
		$this->password = 'root' ;//密码
		$this->dbname = 'hunter';//数据库名
		//set default charset as utf8
		$this->charset = 'UTF8';
		$this->do_replication = $do_replication;
	}


	/**
	 * 设置Mysql服务器端口
	 *
	 * 当需要连接其他APP的数据库时使用
	 *
	 * @param string $port
	 * @return void
	 * @author EasyChen
	 */
	public function setPort( $port )
	{
		$this->port = $port;
		$this->host = 'localhost';
	}

	/**
	 * 设置当前连接的字符集 , 必须在发起连接之前进行设置
	 *
	 * @param string $charset 字符集,如GBK,GB2312,UTF8
	 * @return void
	 */
	public function setCharset( $charset )
	{
		return $this->set_charset( $charset );
	}

	/**
	 * 同setCharset,向前兼容
	 *
	 * @param string $charset
	 * @return void
	 * @ignore
	 */
	public function set_charset( $charset )
	{
		$this->charset = $charset;
	}

	/**
	 * 运行Sql语句,不返回结果集
	 *
	 * @param string $sql
	 * @return mysqli_result|bool
	 */
	public function runSql( $sql )
	{
		return $this->run_sql( $sql );
	}

	/**
	 * 同runSql,向前兼容
	 *
	 * @param string $sql
	 * @return bool
	 * @author EasyChen
	 * @ignore
	 */
	public function run_sql( $sql )
	{
		$this->last_sql = $sql;
		$dblink = $this->db_write();
		if ($dblink === false) {
			return false;
		}
		$ret = mysqli_query( $dblink, $sql );
		$this->save_error( $dblink );
		return $ret;
	}

	/**
	 * 运行Sql,以多维数组方式返回结果集
	 *
	 * @param string $sql
	 * @return array
	 * @author EasyChen
	 */
	public function getData( $sql )
	{
		return $this->get_data( $sql );
	}

	/**
	 * 同getData,向前兼容
	 *
	 * @ignore
	 */
	public function get_data( $sql )
	{

		$this->last_sql = $sql;
		$data = Array();
		$i = 0;
		$dblink = $this->do_replication ? $this->db_read() : $this->db_write();
		$result = mysqli_query( $dblink , $sql );
		$this->save_error( $dblink );
		if (is_bool($result)) {
			return $result;
		} else {
			while( $Array = mysqli_fetch_array( $result, MYSQL_ASSOC ) ) //
			{
				$data[$i++] = $Array;
			}
		}
		mysqli_free_result($result);
		if( count( $data ) > 0 )
		{
			return $data;
		}
		else
			return false;  
	}

	/**
	 * 运行Sql,以数组方式返回结果集第一条记录
	 *
	 * @param string $sql
	 * @return array
	 * @author EasyChen
	 */
	public function getLine( $sql )
	{
		return $this->get_line( $sql );
	}

	/**
	 * 同getLine,向前兼容
	 *
	 * @param string $sql
	 * @return array
	 * @author EasyChen
	 * @ignore
	 */
	public function get_line( $sql )
	{
		$data = $this->get_data( $sql );
		if ($data) {
			return @reset($data);
		} else {
			return false;
		}
	}

	/**
	 * 运行Sql,返回结果集第一条记录的第一个字段值
	 *
	 * @param string $sql
	 * @return mixxed
	 * @author EasyChen
	 */
	public function getVar( $sql )
	{
		return $this->get_var( $sql );
	}

	/**
	 * 同getVar,向前兼容
	 *
	 * @param string $sql
	 * @return array
	 * @author EasyChen
	 * @ignore
	 */
	public function get_var( $sql )
	{
		$data = $this->get_line( $sql );
		if ($data) {
			return $data[ @reset(@array_keys( $data )) ];
		} else {
			return false;
		}
	}

	/**
	 * 同mysqli_last_id函数
	 * PHP's mysqli_last_id()在id为big int时,会出现溢出,用Sql查询替代掉
	 *
	 * @return int
	 * @author EasyChen
	 */
	public function lastId()
	{
		return $this->last_id();
	}

	/**
	 * 同lastId,向前兼容
	 *
	 * @return int
	 * @author EasyChen
	 * @ignore
	 */
	public function last_id()
	{
		$result = mysqli_insert_id( $this->db_write() );
		return $result;
	}

	/**
	 * 关闭数据库连接
	 *
	 * @return bool
	 * @author EasyChen
	 */
	public function closeDb()
	{
		return $this->close_db();
	}
	/**
	 * 同closeDb,向前兼容
	 *
	 * @return bool
	 * @author EasyChen
	 * @ignore
	 */
	public function close_db()
	{
		if( isset( $this->db_read ) )
			@mysqli_close( $this->db_read );
		if( isset( $this->db_write ) )
			@mysqli_close( $this->db_write );
	}

	/**
	 *  同mysqli_real_escape_string
	 *
	 * @param string $str
	 * @return string
	 * @author EasyChen
	 */
	public function escape( $str )
	{
		if( isset($this->db_read)) $db = $this->db_read ;
		elseif( isset($this->db_write) )  $db = $this->write;
		else $db = $this->db_read();
		return mysqli_real_escape_string( $db , $str );
	}

	/**
	 * 返回错误码
	 *
	 *
	 * @return int
	 * @author EasyChen
	 */
	public function errno()
	{
		return   $this->errno;
	}
	/**
	 * 返回错误信息
	 *
	 * @return string
	 * @author EasyChen
	 */
	public function error()
	{
		return $this->error;
	}

	/**
	 * 返回错误信息,error的别名
	 *
	 * @return string
	 * @author EasyChen
	 */
	public function errmsg()
	{
		return $this->error();
	}

	/**
	 * @ignore
	 */
	private function connect( $is_master = true )
	{
		//if( $is_master ) $host = 'w.' . $this->host;
		//else $host = 'r.' . $this->host;
		$host = $this->host ;
		//echo "</br>$host  $this->username  $this->password  $this->appname  $this->port</br>" ;
		if( !$db = mysqli_connect( $host , $this->username , $this->password , $this->dbname , $this->port ) )
		{
		//	sae_debug('can\'t connect to mysql ' . $host . ':' . $this->port );
			$this->error = mysqli_connect_error();
			$this->errno = mysqli_connect_errno();
			return false;
		}
		mysqli_set_charset( $db, $this->charset);
		return $db;
	}

	/**
	 * @ignore
	 */
	private function db_read()
	{
		if( isset( $this->db_read ) )
		{
			mysqli_ping( $this->db_read );
			return $this->db_read;
		}
		else
		{
			if( !$this->do_replication ) return $this->db_write();
			else
			{
				$this->db_read = $this->connect( false );
				return $this->db_read;
			}
		}
	}

	/**
	 * @ignore
	 */
	private function db_write()
	{
		if( isset( $this->db_write ) )
		{
			mysqli_ping( $this->db_write );
			return $this->db_write;
		}
		else
		{
			$this->db_write = $this->connect( true );
			return $this->db_write;
		}
	}

	/**
	 * @ignore
	 */
	private function save_error($dblink)
	{
		$this->error = mysqli_error($dblink);
		$this->errno = mysqli_errno($dblink);
	}


	private $error;
	private $errno;
	private $last_sql;
}
?> 
