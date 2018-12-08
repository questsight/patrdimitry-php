<?php site_header(); ?>

<div class="page">
  <div class="page__header">
    <h1 class="page__title">Подопечные</h1>
    <div class="button-group text-right">
      <a href="/patient/add/" class="button button_bg_theme button_size_small">Добавить</a>
    </div>
  </div>
  <div class="page__content">
    <div class="list">
      <?php foreach ( $patientList as $patientItem => $patientList ) : ?>
      <section class="list__item item">
        <table class="item__table">
          <tr>
            <td class="item__td item__td_field_number">
              <div class="item__number"><?php $patientNumber = $patientItem + 1; echo $patientNumber; ?></div>
            </td>
            <td class="item__td item__td_field_description">
              <h2 class="item__title"><a href="/patient/<?php echo $patientList[ 'id' ]; ?>"><?php echo $patientList[ 'lastname' ]; ?> <?php echo $patientList[ 'firstname' ] ?> <?php echo $patientList[ 'patronymic' ]; ?></a></h2>
              <div class="item__content">
                <div class="item__field">Метро: <?php echo $patientList[ 'metro' ]; ?></div>
                <div class="item__field">Старшая сестра поста: <?php echo $patientList[ 'head_nurse' ]; ?></div>
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
