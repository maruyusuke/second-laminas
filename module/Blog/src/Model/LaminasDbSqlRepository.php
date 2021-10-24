<?php

namespace Blog\Model;

use InvalidArgumentException;
use RuntimeException;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Sql;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Hydrator\ReflectionHydrator;
use Laminas\Db\ResultSet\HydratingResultSet;
// use Laminas\Db\ResultSet\ResultSet;

class LaminasDbSqlRepository implements PostRepositoryInterface
{

  /**
     * @var AdapterInterface
     */
    private $db;

    /**
     * @param AdapterInterface $db
     */
    public function __construct(AdapterInterface $db)
    {
        $this->db = $db;
    }

    /**
     * {@inheritDoc}
     */
    public function findAllPosts()
    {
        $sql    = new Sql($this->db);
        $select = $sql->select('posts');
        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
          
        $resultSet = new HydratingResultSet(
          new ReflectionHydrator(),
          new Post('', '')
        );
        $resultSet->initialize($result);
        echo '<pre>';
        var_export($resultSet);
        echo '</pre>';
        die();
        return $resultSet;
          
          // $resultSet = new ResultSet();
          // $resultSet->initialize($result);
          // echo '<pre>';
          // var_export($resultSet);
          // echo '</pre>';
          // die();
        }

        // echo '<pre>';
        // var_export($result);
        // echo '</pre>';
        // die();
        // return $result;
    }

    /**
     * {@inheritDoc}
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function findPost($id)
    {
    }
}