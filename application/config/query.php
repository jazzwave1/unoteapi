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
            ,'null' => array('accessToken')
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
        ,'getNoteCnt' => array(
            'query' => 'SELECT count(*) as total_cnt
                          FROM note
                         WHERE usn = ?
                           AND deldate IS NULL'
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
                         WHERE n_idx = ?
                         ORDER BY n_idx, s_idx'
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
        ,'insertWriteHistory' => array(
            'query' => 'INSERT INTO write_history(ver, usn, n_idx, s_idx, contents, regdate)
                        SELECT ?,?, n_idx, s_idx, contents, now() 
                          FROM note_sentence
                         WHERE n_idx = ?'
            ,'data' => array('ver', 'usn','n_idx')
            ,'btype'=> 'iii'
            ,'null' => array()
        )
        ,'getVerNumber' => array(
            'query' => 'SELECT ifnull( max(ver) , 0 ) as nowver 
                          FROM write_history 
                         WHERE n_idx = ?
                           and usn = ?'
            ,'data' => array('n_idx','usn')
            ,'btype'=> 'ii'
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
            'query' => 'INSERT INTO req_filter(account, corporation, site, board)
                        VALUES (?,?,?,?)'
           ,'data' => array('account', 'corporation', 'site', 'board')
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
                         WHERE account = ?
                         ORDER BY regdate DESC'
            ,'data' => array('account')
            ,'btype'=> 's'
            ,'null' => array()
        )
        ,'deleteMSGQByHistory' => array(
            'query' => 'UPDATE msgq 
                           set state = ?
                         where q_idx = ?'
            ,'data' => array('state','q_idx')
            ,'btype'=> 'ss'
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
        ,'getCategoryCnt' => array(
            'query' => 'SELECT count(*) as total_cnt
                          FROM text_bank
                         WHERE usn = ?
                           AND category_idx = ?
                           AND deltype is NULL'
           ,'data' => array('usn', 'category_idx')
           ,'btype'=> 'ii'
           ,'null' => array()
        )
        ,'isCategory' => array(
            'query' => 'SELECT count(*) as cnt
                          FROM category
                         WHERE usn = ?
                           AND name = ?'
           ,'data' => array('usn', 'name')
           ,'btype'=> 'is'
           ,'null' => array()
        )
        ,'setCategory' => array(
            'query' => 'INSERT INTO category(usn, name)
                        VALUES (?,?)'
           ,'data' => array('usn', 'name')
           ,'btype'=> 'is'
           ,'null' => array()
        )
        ,'updateCategory' => array(
            'query' => 'UPDATE category
                           SET name = ?
                         WHERE category_idx = ?
                           AND usn = ?'
           ,'data' => array('name', 'category_idx', 'usn')
           ,'btype'=> 'sii'
           ,'null' => array()
        )
        ,'deleteCategory' => array(
            'query' => 'DELETE 
                         FROM category
                        WHERE category_idx=?'
           ,'data' => array('category_idx')
           ,'btype'=> 'i'
           ,'null' => array()
        )
        ,'goCategory' => array(
            'query' => 'UPDATE text_bank
                           SET category_idx = ?
                         WHERE t_idx = ?'
           ,'data' => array('category_idx', 't_idx')
           ,'btype'=> 'ii'
           ,'null' => array()
        )
        ,'cancleCategory' => array(
            'query' => 'UPDATE text_bank
                           SET category_idx = NULL
                         WHERE t_idx = ?'
           ,'data' => array('t_idx')
           ,'btype'=> 'i'
           ,'null' => array()
        )
    )
    ,'article' => array(
        'updateTextbankForCidx' => array(
            'query' => 'UPDATE text_bank
                           SET category_idx = NULL
                         WHERE category_idx = ?'
           ,'data' => array('category_idx')
           ,'btype'=> 'i'
           ,'null' => array()
        )
        ,'getUnreadArticleCnt' => array(
            'query' => 'SELECT count(*) as cnt
                          FROM text_bank
                         WHERE usn = ?
                           AND readchk is NULL
                           AND deltype is NULL
                           AND category_idx is NULL'
            ,'data' => array('usn')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getArticleInfoByUsn' => array(
            'query' => 'SELECT t_idx, usn, craw_data, readchk, bookmark, deltype, category_idx, deldate, regdate, editdate
                          FROM text_bank
                         WHERE usn = ?
                           AND deltype is NULL
                           AND category_idx is NULL
                         ORDER BY t_idx DESC'
            ,'data' => array('usn')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getArticleCnt' => array(
            'query' => 'SELECT count(*) as total_cnt
                          FROM text_bank
                         WHERE usn = ?
                           AND deltype is NULL
                           AND category_idx is NULL'
            ,'data' => array('usn')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getArticleBookmarkInfo' => array(
            'query' => 'SELECT t_idx, usn, craw_data, readchk, bookmark, deltype, category_idx, deldate, regdate, editdate
                          FROM text_bank
                         WHERE usn = ?
                           AND bookmark = ?
                           AND deltype is NULL
                         ORDER BY editdate DESC, t_idx DESC'
            ,'data' => array('usn','bookmark')
            ,'btype'=> 'is'
            ,'null' => array()
        )
        ,'getArticleBookmarkCnt' => array(
            'query' => 'SELECT count(*) as total_cnt
                          FROM text_bank
                         WHERE usn = ?
                           AND bookmark = ?
                           AND deltype is NULL'
            ,'data' => array('usn','bookmark')
            ,'btype'=> 'is'
            ,'null' => array()
        )
        ,'getArticleTrashInfo' => array(
            'query' => 'SELECT t_idx, usn, craw_data, readchk, bookmark, deltype, category_idx, deldate, regdate, editdate
                          FROM text_bank
                         WHERE usn = ?
                           AND deltype = ?
                         ORDER BY deldate DESC, t_idx DESC'
            ,'data' => array('usn','deltype')
            ,'btype'=> 'is'
            ,'null' => array()
        )
        ,'getArticleTrashCnt' => array(
            'query' => 'SELECT count(*) as total_cnt
                          FROM text_bank
                         WHERE usn = ?
                           AND deltype = ?'
            ,'data' => array('usn','deltype')
            ,'btype'=> 'is'
            ,'null' => array()
        )
        ,'getArticleCategoryInfo' => array(
            'query' => 'SELECT t_idx, usn, craw_data, readchk, bookmark, deltype, category_idx, deldate, regdate, editdate
                          FROM text_bank
                         WHERE usn = ?
                           AND category_idx = ?
                           AND deltype is NULL
                         ORDER BY t_idx DESC'
            ,'data' => array('usn','category_idx')
            ,'btype'=> 'is'
            ,'null' => array()
        )
        ,'getArticleInfoByTidx' => array(
            'query' => 'SELECT t_idx, usn, craw_data, readchk, bookmark, deltype, category_idx, deldate, regdate, editdate
                          FROM text_bank
                         WHERE t_idx = ?'
            ,'data' => array('t_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'deleteArticle' => array(
            'query' => "UPDATE text_bank
                           SET deltype = ?
                              ,deldate = ?
                         WHERE t_idx = ?"
            ,'data' => array('deltype', 'deldate', 't_idx')
            ,'btype'=> 'ssi'
            ,'null' => array()
        )
        ,'deleteTrash' => array(
            'query' => "DELETE 
                         FROM text_bank
                        WHERE t_idx=?"
            ,'data' => array('t_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'chkBookmarkArticle' => array(
            'query' => "UPDATE text_bank
                           SET bookmark = ?
                              ,editdate = ?
                         WHERE t_idx = ?"
            ,'data' => array('bookmark', 'editdate', 't_idx')
            ,'btype'=> 'ssi'
            ,'null' => array()
        )
        ,'unchkBookmarkArticle' => array(
            'query' => "UPDATE text_bank
                           SET bookmark = NULL
                              ,editdate = ?
                         WHERE t_idx = ?"
            ,'data' => array('editdate', 't_idx')
            ,'btype'=> 'si'
            ,'null' => array()
        )
        ,'isBookmarkArticle' => array(
            'query' => "SELECT t_idx, usn, craw_data, readchk, bookmark, deltype, category_idx, deldate, regdate, editdate
                          FROM text_bank
                         WHERE t_idx = ?
                           AND bookmark = 'Y'"
            ,'data' => array('t_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'readArticle' => array(
            'query' => "UPDATE text_bank
                           SET readchk = 'Y'
                         WHERE t_idx = ?"
            ,'data' => array('t_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'deleteArticleByCidx' => array(
            'query' => "DELETE 
                         FROM text_bank
                        WHERE category_idx=?"
            ,'data' => array('category_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'deleteArticleByHistory' => array(
            'query' => "DELETE 
                         FROM text_bank
                        WHERE q_idx=?"
            ,'data' => array('q_idx')
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
    ,'admin' => array(
        'getArticleCnt' => array(
            'query' => '
                SELECT m.site_id , q.cnt 
                  FROM msgq m , (
                    SELECT q_idx, count(*) as cnt 
                      FROM text_bank
                     GROUP BY q_idx ) q
                 WHERE m.q_idx = q.q_idx
                   and m.site_id >= ?' 
            
            ,'data' => array('site_id')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getNoteCnt' => array(
            'query' => "
                 SELECT date_format(regdate, '%Y-%m-%d') as month, count(*) as cnt 
                   FROM eduniety.note
                  WHERE deldate is null
                    AND regdate >= ?
                  GROUP by date_format(regdate, '%Y-%m-%d')"
            ,'data' => array('regdate')
            ,'btype'=> 's'
            ,'null' => array()
        )
        ,'getApiCallCnt' => array(
            'query' => "
                SELECT api , date_format(regdate, '%Y-%m-%d')as day, count(*) as cnt
                  FROM eduniety.api_call_history
                 WHERE  regdate >= ? 
                 GROUP BY api , date_format(regdate, '%Y-%m-%d')"
            ,'data' => array('regdate')
            ,'btype'=> 's'
            ,'null' => array()
        )
        ,'getApiCallCntTotal' => array(
            'query' => "
                SELECT api ,  count(*) as cnt
                  FROM eduniety.api_call_history
                 WHERE usn >= ? 
                 GROUP BY api "
            ,'data' => array('usn')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getAccountTotalCnt' => array(
            'query' => "
                SELECT count(*) as cnt
                  FROM eduniety.account
                 WHERE usn >= ?"
            ,'data' => array('usn')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        ,'getNoteTotalCnt' => array(
            'query' => "
                SELECT count(*) as cnt
                  FROM eduniety.note
                 WHERE n_idx >= ?
                   AND deldate is null"
            ,'data' => array('n_idx')
            ,'btype'=> 'i'
            ,'null' => array()
        )
        
    )
    ,'log' => array(
        'setApiLog' => array(
             'query' => 'INSERT INTO api_call_history ( usn, api, input, output, c_code, regdate) 
                        VALUES (?,?,?,?,?,?)'
            ,'data' => array('usn','api','input','output','c_code','regdate')
            ,'btype'=> 'isssss'
            ,'null' => array('output')
         )
        
    )
);
