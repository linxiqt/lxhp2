<?php

class DB
{
    private static $link;

    /**
     * 连接到 SQLite 数据库
     * @param string $db_file 数据库文件路径
     * @return PDO|false 返回 PDO 实例或 false
     */
    public static function connect($db_file)
    {
        try {
            self::$link = new PDO("sqlite:$db_file");
            self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$link;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * 执行 SQL 查询并返回结果集
     * @param string $query SQL 查询语句
     * @return PDOStatement|false 查询结果或 false
     */
    public static function query($query)
    {
        if (!self::$link) {
            return false; // 未连接数据库
        }

        try {
            return self::$link->query($query);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * 获取查询结果的单行
     * @param string $query SQL 查询语句
     * @return array|false 查询结果或 false
     */
    public static function get_row($query)
    {
        $result = self::query($query);
        return $result ? $result->fetch(PDO::FETCH_ASSOC) : false;
    }

    /**
     * 获取查询结果的行数
     * @param string $query SQL 查询语句
     * @return int|false 查询结果的行数或 false
     */
    public static function count($query)
    {
        $result = self::query($query);
        if (!$result) {
            return false;
        }
        $rows = $result->fetch();
        return $rows ? (int) $rows[0] : 0; // 防止返回 null 或非数值
    }

    /**
     * 插入数据
     * @param string $table 表名
     * @param array $data 关联数组，键为列名，值为要插入的值
     * @return bool 是否成功
     */
    public static function insert($table, $data)
    {
        if (!self::$link) {
            return false; // 未连接数据库
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        try {
            $stmt = self::$link->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * 更新数据
     * @param string $table 表名
     * @param array $data 关联数组，键为列名，值为要更新的值
     * @param string $condition WHERE 条件
     * @return bool 是否成功
     */
    public static function update($table, $data, $condition)
    {
        if (!self::$link) {
            return false; // 未连接数据库
        }

        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");
        $sql = "UPDATE $table SET $set WHERE $condition";

        try {
            $stmt = self::$link->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * 删除数据
     * @param string $table 表名
     * @param string $condition WHERE 条件
     * @return bool 是否成功
     */
    public static function delete($table, $condition)
    {
        if (!self::$link) {
            return false; // 未连接数据库
        }

        $sql = "DELETE FROM $table WHERE $condition";

        try {
            $stmt = self::$link->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * 获取最后的错误信息
     * @return string|null 最后错误信息或 null
     */
    public static function error()
    {
        if (self::$link) {
            $errorInfo = self::$link->errorInfo();
            return $errorInfo[2] ?? '未知错误'; // 返回详细错误信息
        }
        return null;
    }

    /**
     * 关闭数据库连接
     * @return bool
     */
    public static function close()
    {
        self::$link = null;
        return true;
    }
}
?>