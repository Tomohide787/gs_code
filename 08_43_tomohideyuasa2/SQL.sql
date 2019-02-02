INSERT INTO gs_an_table(name, email, naiyou, indate)VALUES('井ノ上','test5@test.jp','test5',sysdate());

-- （）内にidはなくて大丈夫！

SELECT * FROM gs_an_table WHERE name = '湯淺'

SELECT * FROM gs_an_table WHERE id=2

SELECT * FROM gs_an_table WHERE id>=3

SELECT * FROM gs_an_table WHERE name LIKE '%井%'

SELECT * FROM gs_an_table ORDER BY indate DESC
--数字が大きい、つまり最新のものから順に並べる

SELECT * FROM gs_an_table ORDER BY indate DESC LIMIT 3


--//////////////////////////////////////////////////////////////////////
--これ以降が課題！！！！！！！！！！

--1. SELECT文を使って、"id" 「1,3,5」だけ抽出するSQLを作る

SELECT * FROM gs_an_table WHERE id=1 OR id=3 OR id=5

--2. SELECT文を使って、"id" 「4〜8」を抽出するSQLを作る

SELECT * FROM gs_an_table WHERE id>=4 AND id<=8
SELECT * FROM gs_an_table LIMIT 3, 5

--3. SELECT文を使って、"email"「test1」を抽出するあいまい検索を作る

SELECT * FROM gs_an_table WHERE email LIKE '%test1%'

--4. SELECT文を使って、"新しい日付順"にソートするSQLを作る。

SELECT * FROM gs_an_table ORDER BY indate DESC

--5. SELECT文を使って、"age"「20」で"indate"「2017-05-26%」のデータを抽出するSQLを作る
--(ageカラムが無ければ作る[値：10,20,30,40]をテストデータとして入れる)

SELECT * FROM gs_an_table WHERE age=20 AND indate LIKE '2019-01-19%'

--6. SELECT文を使って、"新しい日付順"で、「5個」だけ取得するSQLを作る

SELECT * FROM gs_an_table ORDER BY indate DESC LIMIT 5

--7. （難問題） "age"で「GROUP BY 」使い10,20,30,40歳が各何人知るか抽出するSQLを作る

SELECT age, COUNT(*) FROM gs_an_table GROUP BY age 

--以上です
--//////////////////////////////////////////////////////////////////////




