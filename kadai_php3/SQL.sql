-- 既存構文は「大文字」、オリジナル項目は「小文字」か「大文字」

-- 挿入
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('ありた','test01@example.com','ないよ',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('かとう','test02@example.com','ないよ',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('ささき','test03@example.com','ないよ',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('たどころ','test04@example.com','ないよ',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('なべしま','test11@example.com','ないよ',sysdate());

-- 検索
SELECT * FROM gs_an_table;
SELECT name FROM gs_an_table;
SELECT name,enail FROM gs_an_table;
-- 条件付き検索
SELECT * FROM gs_an_table WHERE id = 1;
SELECT * FROM gs_an_table WHERE id >= 3;

-- あいまい検索
SELECT * FROM gs_an_table WHERE name LIKE '%あり%';

-- 並べ替え
SELECT * FROM gs_an_table ORDER BY id DESC; --id名の大きい順に並べる
SELECT * FROM gs_an_table ORDER BY id DESC LIMIT 3; --id名の大きい順の3つだけ表示

INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES(:name,:email,:naiyou,sysdate());




