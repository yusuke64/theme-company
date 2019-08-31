<?php
add_action('admin_menu', 'top_setting');

function top_setting() {
  add_menu_page('各種ページ設定', '各種ページ設定', 10,'top_setting', 'top_setting_page');
  add_action( 'admin_init', 'register_top_settings' );
}

function register_top_settings() {
  register_setting( 'top-settings-group', 'top_image' );
  register_setting( 'top-settings-group', 'about_title' );
  register_setting( 'top-settings-group', 'about_text' );
  register_setting( 'top-settings-group', 'news_title' );
  register_setting( 'top-settings-group', 'news_linktext' );
  register_setting( 'top-settings-group', 'news_link' );
  register_setting( 'top-settings-group', 'no_image' );
  register_setting( 'top-settings-group', 'access_title' );
  register_setting( 'top-settings-group', 'access_map' );
}

function top_setting_page() {
?>
  <div class="wrap">
    <form method="post" action="options.php">
      <?php
        settings_fields( 'top-settings-group' );
        do_settings_sections( 'top-settings-group' );
        ?>
      <div class="setting-content-wrap">
        <div class="setting-content">
          <h2 class="setting-content-title">トップページ画像</h2>
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">画像URL</th>
                <td><input type="text" id="top_image" class="regular-text" name="top_image" value="<?php echo esc_html(get_option('top_image')); ?>"></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="setting-content">
          <h2 class="setting-content-title">ABOUT欄</h2>
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  <label for="about_title">タイトル</label>
                </th>
                  <td><input type="text" id="about_title" class="regular-text" name="about_title" value="<?php echo esc_html(get_option('about_title')); ?>"></td>
              </tr>
              <tr>
                <th scope="row">
                  <label for="about_text">本文</label>
                </th>
                  <td><textarea rows="5" type="text" id="about_text" class="regular-text" name="about_text"><?php echo esc_html(get_option('about_text')); ?></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="setting-content">
          <h2 class="setting-content-title">NEWS欄</h2>
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  <label for="news_title">タイトル</label>
                </th>
                  <td><input type="text" id="news_title" class="regular-text" name="news_title" value="<?php echo esc_html(get_option('news_title')); ?>"></td>
              </tr>
              <tr>
                <th scope="row">
                  <label for="news_linktext">お知らせ一覧ページへのリンク文字</label>
                </th>
                  <td><input type="text" id="news_linktext" class="regular-text" name="news_linktext" value="<?php echo esc_html(get_option('news_linktext')); ?>"></td>
              </tr>
              <tr>
                <th scope="row">
                  <label for="news_link">お知らせ一覧ページへのリンク</label>
                </th>
                  <td><input type="text" id="news_link" class="regular-text" name="news_link" value="<?php echo esc_html(get_option('news_link')); ?>"></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="setting-content">
          <h2 class="setting-content-title">アクセス欄</h2>
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  <label for="access_title">タイトル</label>
                </th>
                  <td><input type="text" id="access_title" class="regular-text" name="access_title" value="<?php echo esc_html(get_option('access_title')); ?>"></td>
              </tr>
              <tr>
                <th scope="row">
                  <label for="access_map">地図埋め込みタグ</label>
                </th>
                  <td><input type="text" id="access_map" class="regular-text" name="access_map" value="<?php echo esc_html(get_option('access_map')); ?>"></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="setting-content">
          <h2 class="setting-content-title">お知らせ投稿でアイキャッチ画像がないときの画像</h2>
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  <label for="no_image">画像URL</label>
                </th>
                  <td><input type="text" id="no_image" class="regular-text" name="no_image" value="<?php echo esc_html(get_option('no_image')); ?>"></td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <?php submit_button(); ?>
    </form>
  </div>
<?php
}
