<?php site_header(); ?>

<div class="page">
  <div class="page__header">
    <h1 class="page__title">Добровольцы</h1>
    <div class="button-group text-right">
      <a href="/volunteer/add/" class="button button_bg_theme button_size_small">Добавить</a>
    </div>
  </div>
  <div class="page__content">
    <div class="list">
      <?php foreach ( $volunteerList as $volunteerItem => $volunteerList ) : ?>
      <section class="list__item item">
        <table class="item__table">
          <tr>
            <td class="item__td item__td_field_number">
              <div class="item__number"><?php $volunteerNumber = $volunteerItem + 1; echo $volunteerNumber; ?></div>
            </td>
            <td class="item__td item__td_field_description">
              <h2 class="item__title"><a href="/volunteer/<?php echo $volunteerList[ 'id' ]; ?>"><?php echo $volunteerList[ 'lastname' ]; ?> <?php echo $volunteerList[ 'firstname' ] ?> <?php echo $volunteerList[ 'patronymic' ]; ?></a></h2>
              <div class="item__content">
                <div class="item__field">Вид помощи: <?php echo $volunteerList[ 'specialization' ]; ?></div>
                <div class="item__field">Телефон: <?php echo $volunteerList[ 'mobile' ]; ?></div>
              </div>
            </td>
          </tr>
        </table>
      </section>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="page__footer">

  </div>
</div>

<?php site_footer(); ?>
