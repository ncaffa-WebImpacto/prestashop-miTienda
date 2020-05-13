<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$langs = Language::getLanguages(false);
$res = (bool)Db::getInstance()->execute(' TRUNCATE TABLE `'._DB_PREFIX_.'bitblogcat`  ');
$res = (bool)Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_."bitblogcat`  (`id_bitblogcat`, `image`, `id_parent`, `item`, `level_depth`, `active`, `position`, `submenu_content`, `privacy`, `position_type`, `menu_class`, `content`, `icon_class`, `level`, `left`, `right`, `date_add`, `date_upd`, `template`, `randkey`) VALUES
(1, '', 0, NULL, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, '', NULL),
(2, 'category-1.jpg', 1, NULL, 1, 1, 1, '', 0, NULL, '', NULL, '', 0, 0, 0, '2019-10-03 02:48:13', '2019-10-03 05:33:46', 'default', '0dc5b27365199d2ffb49f286e6e83156'),
(3, 'category-2.jpg', 2, NULL, 2, 1, 1, '', 0, NULL, '', NULL, '', 0, 0, 0, '2019-10-03 02:53:52', '2019-10-03 05:33:57', 'default', '8e69f5bcb17fb03da3ee794db05ff680'),
(4, 'category-3.jpg', 2, NULL, 2, 1, 1, '', 0, NULL, '', NULL, '', 0, 0, 0, '2019-10-03 02:54:22', '2019-10-03 05:34:05', 'default', '03fd9fd4063ec57bac6cfcb9f9ec0d20');
");

$res = (bool)Db::getInstance()->execute(' TRUNCATE TABLE `'._DB_PREFIX_.'bitblogcat_lang`  ');
foreach ($langs as $l) {
    $sql = 'INSERT INTO `'._DB_PREFIX_."bitblogcat_lang` (`id_bitblogcat`, `id_lang`, `title`, `content_text`, `description`, `meta_keywords`, `meta_description`, `link_rewrite`) VALUES
        (1, LANGUAGEID, 'Root', NULL, '', '', '', ''),
        (2, LANGUAGEID, 'Home', '<p>The expression and the text that begins with Lorem Ipsum has been used a long time as a simple dummy text and filler, when developing and designing websites to easily insert content on a demo website.</p>', '', '', '', 'home'),
        (3, LANGUAGEID, 'Fashion', '<p>Libero commodo consequat cum Accumsan diam varius velit, vehicula mattis suspendisse phasellus vivamus litora laoreet donec et cubilia habitasse various senectus.</p>', '', '', '', 'fashion'),
        (4, LANGUAGEID, 'Decor', '<p>Curae egestas laoreet nam, nulla fames nec tellus velit nunc commodo fames mi est. Fringilla auctor sodales sodales praesent curae.</p>', '', '', '', 'decor');
        ";
    $sql = str_replace('LANGUAGEID', $l['id_lang'], $sql);
    $res = (bool)Db::getInstance()->execute($sql);
}


$res = (bool)Db::getInstance()->execute(' TRUNCATE TABLE `'._DB_PREFIX_.'bitblogcat_shop`  ');
$res = (bool)Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'bitblogcat_shop` (`id_bitblogcat`, `id_shop`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1); ');

$res = (bool)Db::getInstance()->execute(' TRUNCATE TABLE `'._DB_PREFIX_.'bitblog_blog`  ');
$res = (bool)Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_."bitblog_blog` (`id_bitblog_blog`, `id_bitblogcat`, `position`, `date_add`, `active`, `user_id`, `hits`, `image`, `thumb`, `date_upd`, `video_code`, `params`, `featured`, `indexation`, `id_employee`, `product_ids`, `author_name`) VALUES
(1, 2, 0, '2019-10-03', 1, 0, 40, 'b-blog-1.jpg', '', '2019-10-03 07:48:42', '', NULL, 0, 1, 1, NULL, 'ThemeDelights'),
(2, 3, 0, '2019-10-03', 1, 0, 92, 'b-blog-2.jpg', '', '2019-10-03 08:34:07', '', NULL, 0, 0, 1, NULL, 'ThemeDelights'),
(3, 4, 0, '2019-10-03', 1, 0, 58, 'b-blog-3.jpg', '', '2019-10-03 05:40:12', '', NULL, 0, 1, 1, NULL, 'ThemeDelights'),
(4, 2, 1, '2019-10-03', 1, 0, 241, 'b-blog-4.jpg', '', '2019-10-03 05:23:14', '', NULL, 0, 1, 1, NULL, 'ThemeDelights'),
(5, 3, 1, '2019-10-03', 1, 0, 152, 'b-blog-5.jpg', '', '2019-10-03 05:40:30', '', NULL, 0, 0, 1, NULL, 'ThemeDelights'),
(6, 2, 2, '2019-10-03', 1, 0, 121, 'b-blog-6.jpg', '', '2019-10-03 05:27:52', '', NULL, 0, 1, 1, NULL, 'ThemeDelights'),
(7, 4, 1, '2019-10-03', 1, 0, 18, 'b-blog-7.jpg', '', '2019-10-03 05:40:41', '', NULL, 0, 1, 1, NULL, 'ThemeDelights'),
(8, 2, 3, '2019-10-03', 1, 0, 21, 'b-blog-8.jpg', '', '2019-10-03 05:30:20', '', NULL, 0, 1, 1, NULL, 'ThemeDelights');
");

$res = (bool)Db::getInstance()->execute(' TRUNCATE TABLE `'._DB_PREFIX_.'bitblog_blog_lang`  ');
foreach ($langs as $l) {
    $sql = 'INSERT INTO `'._DB_PREFIX_."bitblog_blog_lang`  (`id_bitblog_blog`, `id_lang`, `meta_description`, `meta_keywords`, `meta_title`, `link_rewrite`, `content`, `description`, `tags`) VALUES
    (1, LANGUAGEID, '', '', 'Curabitur ullamcor ultricies nisi', 'curabitur-ullamcor-ultricies-nisi', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p><p>Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p><p>Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.</p><p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient.</p>', 'aenean,sapien'),
    (2, LANGUAGEID, '', '', 'Etiam ultricies nisi vel', 'etiam-ultricies-nisi-vel', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p><p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p><p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>', 'incidunt,faucibus'),
    (3, LANGUAGEID, '', '', 'Donec sodale sagittis magna', 'donec-sodale-sagittis-magna', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p><p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p><p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p><p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that</p>', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and</p>', 'incidunt,nymphs'),
    (4, LANGUAGEID, '', '', 'Share the Love for PrestaShop', 'share-love-for-prestashop', '<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.</p><p>At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p><p>A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.</p><p>At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation</p>', '<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues</p>', 'aenean,nymphs'),
    (5, LANGUAGEID, '', '', 'Christmas Sale is here', 'christmas-sale-is-here', '<p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p><p>To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p><p>To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p><p>Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a</p>', '<p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The.</p>', 'faucibus,corrupti,sapien'),
    (6, LANGUAGEID, '', '', 'Quis Nostrum Exercitationem', 'quis-nostrum-exercitationem', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p><p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p><p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p><p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their</p>', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right</p>', 'corrupti,libero,nymphs'),
    (7, LANGUAGEID, '', '', 'Harum Quidem Rerum Facilis', 'harum-quidem-rerum-facilis', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p><p>I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p><p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath of that universal love which bears and sustains us, as it floats around us in an eternity of bliss;</p><p>and then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing, Oh, would I could describe these conceptions, could impress upon paper all that is living so full and warm within me, that it might be the mirror of my soul, as my soul is the mirror of the infinite God!</p>', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the cha</p>', 'corrupti,aenean,incidunt'),
    (8, LANGUAGEID, '', '', 'Righteous Indignation Men', 'righteous-indignation-men', '<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment.</p><p>His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. What is happened to me?  he thought. It was not a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p><p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.</p><p>Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad. How about if I sleep a little bit longer and forget all this nonsense, he thought, but that was something he was unable to do because he was used to sleeping on his right, and in his present state could not get into that position. However hard he threw himself onto his right, he always rolled back to where he was. He must have tried it a hundred times, shut his eyes so that he would not have to look at the floundering legs, and only stopped when</p>', '<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if</p>', 'sapien,faucibus');
    ";
    $sql = str_replace('LANGUAGEID', $l['id_lang'], $sql);
    $res = (bool)Db::getInstance()->execute($sql);
}

$res = (bool)Db::getInstance()->execute(' TRUNCATE TABLE `'._DB_PREFIX_.'bitblog_blog_shop`  ');
$res = (bool)Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'bitblog_blog_shop` (`id_bitblog_blog`, `id_shop`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1); ');

$res = (bool)Db::getInstance()->execute(' TRUNCATE TABLE `'._DB_PREFIX_.'bitblog_comment`  ');
$res = (bool)Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_."bitblog_comment` (`id_comment`, `id_shop` , `id_bitblog_blog`, `comment`, `active`, `date_add`, `user`, `email`) VALUES
(1, 1, 7, 'How twitter can teach you about special Olympic world games. 9 myths uncovered about sports fan clubs. Why football teams are on crack about football teams.', 1, '2019-10-03 08:37:15', 'Bhavik', 'admin@gmail.com'),
(2, 1, 8, 'are on crack about football teams. 8 facts about free sports picks that will impress your friends. The 16 biggest football team blunders.', 1, '2019-10-03 08:37:23', 'demo', 'demo@gmail.com'),
(3, 1, 8, 'you\'re losing money by not using kids sports awards. The unconventional guide to football highlights.', 1, '2019-10-03 08:39:48', 'abc', 'abc@gmail.com');");