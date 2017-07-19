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
            'query' => 'INSERT INTO account ( account, oauth, regdate , accessToken)
                        VALUES (?,?,?,?)'
            ,'data' => array('account', 'oauth', 'regdate', 'accessToken')
            ,'btype'=> 'ssss'
            ,'null' => array()
        )
    )
    ,'note' => array(
        'getNoteInfoByUsn' => array(
            'query' => 'SELECT n_idx, usn, title, regdate
                          FROM note
                         WHERE usn = ?
                           AND deldate IS NULL
                         ORDER BY n_idx DESC'
            ,'data' => array('usn')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getNoteSummary' => array(
            'query' => 'SELECT n_idx, s_idx, contents
                          FROM note_sentence
                         WHERE n_idx = ?
                         LIMIT 1'
            ,'data' => array('n_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getNoteDetailInfo' => array(
            'query' => 'SELECT n_idx, s_idx, contents
                          FROM note_sentence
                         WHERE n_idx = ?'
            ,'data' => array('n_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getNoteInfoByNidx' => array(
            'query' => 'SELECT n_idx, usn, title, regdate
                          FROM note
                         WHERE n_idx = ?
                           AND deldate IS NULL'
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
        ,'insertNoteSentence' => array(
            'query' => 'INSERT INTO note_sentence(n_idx, s_idx, contents)
                        VALUES (?,?,?)'
           ,'data' => array('n_idx', 's_idx', 'contents')
           ,'btype'=> 'iis'
           ,'null' => array()
       )
        ,'deleteNote' => array(
            'query' => "UPDATE note
                           SET deldate = ? 
                         WHERE n_idx = ?"
            ,'data' => array('deldate', 'n_idx')
            ,'btype'=> 'si'
            ,'null' => array()
        )        
       ,'deleteNoteSentence' => array(
           'query' => 'DELETE 
                         FROM note_sentence
                        WHERE n_idx=?'
           ,'data' => array('n_idx')
           ,'btype'=> 'i'
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
        ,'insertReqFilter' => array(
            'query' => 'INSERT INTO req_filter(account, corperation, site, board)
                        VALUES (?,?,?,?)'
           ,'data' => array('account', 'corperation', 'site', 'board')
           ,'btype'=> 'ssss'
           ,'null' => array('site', 'board')
       )
    )
    ,'msgq' => array(
        'getMSGQ' => array(
            'query' => 'SELECT q_idx, account, state, regdate, completedate, r_count
                          FROM msgq 
                         WHERE q_idx = ?
                           AND account = ?'
            ,'data' => array('q_idx', 'account')
            ,'btype'=> 'is'
            ,'null' => array()
        )
        ,'setMSGQ' => array(
            'query' => 'INSERT INTO msgq ( account, state, site_id, req_filter, regdate )
                        VALUES (?,?,?,?,?)'
            ,'data' => array('account','state','site_id','req_filter', 'regdate')
            ,'btype'=> 'sssss'
            ,'null' => array("site_id","req_filter")
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
            'query' => 'SELECT q_idx, account, state, site_id, req_filter, regdate, completedate, r_count
                          FROM msgq 
                         WHERE account = ?'
            ,'data' => array('account')
            ,'btype'=> 's'
            ,'null' => array()
        )
    )
    ,'category' => array(
        'getCategoryInfo' => array(
            'query' => 'SELECT category_idx, usn, name
                          FROM category
                         WHERE usn = ?
                         ORDER BY name ASC'
            ,'data' => array('usn')
            ,'btype'=> 'i'
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
