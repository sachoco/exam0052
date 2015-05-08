# FC2新着ブログ情報検索アプリ
作成者：白石　怜（sachoco@gmail.com）

#### デモ：
http://satoshishiraishi.com/exam0052/

#### 動作環境：
PHP 5.3.23以上

#### 導入の手引き：
1. ファイルのアップロード
  + ZIPファイルはこちら→　https://github.com/sachoco/exam0052/archive/master.zip
  + GITレポジトリはこちら→　https://github.com/sachoco/exam0052.git
  + （フォルダ内のファイル全てをルートディレクトリにアップロードしてください。その際ファイル名「import.php」のパーミッションが755になっていることを確認）

2. テーブルの作成（以下のSQLコマンドを使用）
  ```
CREATE TABLE `entry` (
`id` int(11) unsigned NOT NULL,
  `link` varchar(100) NOT NULL,
  `entryno` int(8) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

ALTER TABLE `entry`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `link` (`link`);

ALTER TABLE `entry`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
  ```
3. cronジョブの作成
  + シェルコマンド”crontab -e”にて以下のコマンドを入力
  ```
  */5 * * * * <PATH-TO-THE-ROOT-DIRECTORY>/import.php > /dev/null 2>&1
  ```  
  + ```<PATH-TO-THE-ROOT-DIRECTORY>```はステップ１ファイルのアップロード先（ルートディレクトリ）。ルートディレクトリに移動し、シェルコマンド「pwd」で確認。

  
以上
