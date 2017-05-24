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
                         WHERE account_id = ?'
            ,'data' => array('account_id')
            ,'btype'=> 's'
            ,'null' => array()
        )
        ,'setAccountInfo' => array(
            'query' => 'INSERT INTO account ( account_id, regdate )
                        VALUES (?,?)'
            ,'data' => array('account_id', 'regdate')
            ,'btype'=> 'ss'
            ,'null' => array()
        )
        ,'getEduMemInfo' => array(
            'query' => 'SELECT newid, name, email1, email2, BengSch, OffSch, mobile1, mobile2, mobile3, post, addr, addrdetail
                          FROM member
                         WHERE newid = ?'
            ,'data' => array('newid')
            ,'btype'=> 's'
            ,'null' => array()
        )
    )
    ,'note' => array(
        'getNoteInfo' => array(
            'query' => 'SELECT n_idx, usn, title, regdate
                          FROM note
                         WHERE usn = ?'
            ,'data' => array('usn')
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
                           SET title = ?,
                               regdate = ?
                         WHERE n_idx = ?'
            ,'data' => array('title', 'regdate','n_idx')
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
    ,'crawling' => array(
        'getCrawlingInfo' => array(
            'query' => 'SELECT account, action, datastring
                          FROM ibricks
                         WHERE account = ?'
            ,'data' => array('account')
            ,'btype'=> 's'
            ,'null' => array()
        )
    )
);
