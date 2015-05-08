CREATE TABLE `entry` (
`id` int(11) unsigned NOT NULL,
  `link` varchar(100) NOT NULL,
  `entryno` int(8) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
