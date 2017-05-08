<?php
/*
    * data : ? bind data
    * btype : bind data type
    * null : null check data list (null을 허용하는값)
*/
$config['query'] = array(
    'demon' => array(
        'getTestData' => array(
            'query' => 'SELECT account, action, datastring 
                          FROM ibricks 
                         WHERE account = ?'
        ,'data' => array('accout')
        ,'btype'=> 's'
        ,'null' => array()
        )
        ,'insertTestData' => array(
            'query' => 'INSERT INTO ibricks (account, action, datastring)
                        VALUES (?,?,?)'
        ,'data' => array('account', 'action', 'datastring')
        ,'btype'=> 'sss'
        ,'null' => array()
        )
        ,'updateTestData' => array(
            'query' => 'UPDATE ibricks
                           SET datastring = ? 
                         WHERE account = ?'
        ,'data' => array('datasting', 'account')
        ,'btype'=> 'ss'
        ,'null' => array()
        )
        ,'deleteTestData' => array(
            'query' =>
                "DELETE  
                   FROM ibricks 
                  WHERE account = ?"
        ,'data' => array('account')
        ,'btype'=> 's'
        ,'null' => array()
        )
    )
);
