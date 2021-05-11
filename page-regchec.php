<?php 

/*
Template Name: Активация учетной записи
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

	<main class="main">	
		<section class = "text_page_main_section">
            <div class="inner" id = "main_cabinet_regchec">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h1><?php the_title();?></h1>
                    <?php the_content();?>
                <?php endwhile;?>
                <?php endif; ?>

                <?
                    global $wpdb;
                    $user_feeld =  $wpdb->get_results("SELECT * FROM `shop_users` WHERE `id` = '".$_REQUEST["id"]."'");
                    
                    if (empty($user_feeld) || ($user_feeld[0]->autorizeKey != $_REQUEST["k"])) {
                ?>
                    <div class = "messageFormBlk">
						Ошибка активации. Пользователь не найден.
					</div>
                <?
                    } else {

                    $updateRez = $wpdb->update("shop_users",
                                   array(
                                       "autorize" => 1,
                                       "autorizeKey" => 0,
                                   ), 
                                   array(
                                       "id" => $_REQUEST["id"],
                                       
                                   )
                                );   
                    if (!empty($updateRez)) {
                ?>
                    <div class = "messageFormBlk messageFormBlkOk">
						Ваша учетная запись успешно активирована! <br/><a href="<?echo get_the_permalink(412)?>">Перейти а личный кабинет</a>
					</div>
                <?
                        } else {
                            ?>
                                <div class = "messageFormBlk">
						            Ошибка активации. Данные не обновленны перезагрузите страницу.
					            </div>
                            <?
                        }
                    }
                ?>


            </div>
        </section>
    </main>

<?php get_footer("cooper"); ?>  