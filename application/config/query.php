<?php
/*
    * data : ? bind data
    * btype : bind data type
    * null : null check data list (null을 허용하는값)
*/
$config['query'] = array(
    'account' => array(
        'getAccountInfo' => array(
            'query' => 'SELECT usn, account, accessToken, oauth, regdate
                          FROM account
                         WHERE account = ?'
            ,'data' => array('account')
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
    ,'msgq' => array(
        'getMSGQ' => array(
            'query' => 'SELECT q_idx, account, state, regdate, completedate
                          FROM msgq 
                         WHERE q_idx = ?
                           AND account = ?'
            ,'data' => array('q_idx', 'account')
            ,'btype'=> 'is'
            ,'null' => array()
        )
        ,'setMSGQ' => array(
            'query' => 'INSERT INTO msgq ( account, state, regdate )
                        VALUES (?,?,?)'
            ,'data' => array('account','state','regdate')
            ,'btype'=> 'sss'
            ,'null' => array()
        )
        ,'updateMSGQ' => array(
            'query' => 'UPDATE msgq 
                           set state = ? ,
                               completedate = ? 
                         where q_idx = ?
                           and account = ?'
            ,'data' => array('state','completedate','q_idx','account')
            ,'btype'=> 'ssss'
            ,'null' => array()
        )
        ,'getMSGQList' => array(
            'query' => 'SELECT q_idx, account, state, regdate, completedate
                          FROM msgq 
                         WHERE account = ?'
            ,'data' => array('account')
            ,'btype'=> 's'
            ,'null' => array()
        )

    )


    ,'edumember' => array(
        'getMemberInfo' => array(
            'query' => 'SELECT mb_id, mb_name 
                          FROM edu_member 
                         WHERE trim(mb_id) = ?'
            ,'data' => array('mb_id')
            ,'btype'=> 's'
            ,'null' => array()
        )

    )
);
