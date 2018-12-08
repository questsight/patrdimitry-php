<?php site__header(); ?>

<div class="page">
  <div class="page__header">
    <h1 class="page__title">Сотрудники</h1>
    <div class="button-group text-right">
      <a href="/worker/add/" class="button button_bg_theme button_size_small">Добавить</a>
    </div>
  </div>
  <div class="page__content">
    <div class="list">
      <?php foreach ( $workerList as $workerItem => $workerList ) : ?>
      <section class="list__item item">
        <table class="item__table">
          <tr>
            <td class="item__td item__td_field_number">
              <div class="item__number"><?php $workerNumber = $workerItem + 1; echo $workerNumber; ?></div>
            </td>
            <td class="item__td item__td_field_description">
              <h2 class="item__title"><a href="/worker/<?php echo $workerList[ 'id' ]; ?>"><?php echo $workerList[ 'lastname' ]; ?> <?php echo $workerList[ 'firstname' ] ?> <?php echo $workerList[ 'patronymic' ]; ?></a></h2>
              <div class="item__content">
                <div class="item__field">Должность: <?php echo $workerList[ 'post' ]; ?></div>
                <div class="item__field">Табельный номер: <?php echo $workerList[ 'personnel_number' ]; ?></div>
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

<?php site__footer(); ?>
