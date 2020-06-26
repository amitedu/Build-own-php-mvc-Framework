<div class="searchOption">
  <div class="menu">
    <a href="<?=BASE_URL?>">Home</a>
  </div>
  <div class="search">
    <form action="<?=BASE_URL?>/Index/search" method="post">
      <input type="text" name="keyword" placeholder="Search Here...">
      <select class="catSearch" name="catSearch">
        <option>Select One</option>
        <?php
          foreach($allCat as $key => $value) {
            ?>
            <option value="<?=$value['id']?>"><?=$value['name']?></option>
            <?php
          }
        ?>
      </select>
      <button class="submitbtn" type="submit">Search</button>
    </form>
  </div>
</div>