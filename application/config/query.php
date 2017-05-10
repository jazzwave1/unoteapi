<?php
/*
    * data : ? bind data
    * btype : bind data type
    * null : null check data list (null을 허용하는값)
*/
$config['query'] = array(
    'account' => array(
        'getAccountInfo' => array(
            'query' => 'SELECT usn, account_id, account_pwd, map_oauth, map_account, regdate
                          FROM account
                         WHERE usn = ?'
            ,'data' => array('usn')
            ,'btype'=> 'i'
            ,'null' => array()
        )
    )
    ,'note' => array(
        'getNoteInfo' => array(
            'query' => 'SELECT n_idx, usn, title, regdate, account_usn
                          FROM note
                         WHERE n_idx = ?'
            ,'data' => array('n_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getNoteDisplayInfo' => array(
            'query' => 'SELECT type, header, footer
                          FROM note_display
                         WHERE n_idx = ?'
            ,'data' => array('n_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'insertNote' => array(
            'query' => 'INSERT INTO note (n_idx, usn, title, regdate)
                        VALUES (?,?,?,?)'
           ,'data' => array('n_idx', 'usn', 'title', 'regdate')
           ,'btype'=> 'iiss'
           ,'null' => array()
        )
        ,'updateNote' => array(
            'query' => 'UPDATE note
                           SET header = ?,
                               footer = ?
                         WHERE n_idx = ?'
            ,'data' => array('header', 'footer')
            ,'btype'=> 'ssi'
            ,'null' => array()
        )
        ,'deleteNote' => array(
            'query' => "DELETE  
                          FROM note 
                         WHERE n_idx = ?"
            ,'data' => array('n_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
    )
);
