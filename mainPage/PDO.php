<form method="post" action="web_dev.php?content=items/queryItems.php">
    <fieldset class="fieldset-width2" style="font-size: 20px;border: 2px double #000;border-radius: 15px;padding: 10px;margin: 0 auto;">
      <legend>Search</legend>
      <p>
        <label>Order By:</label>
        <input type="radio"
        name="radOrder"
        id= "name"
        value="name"<?php
        if (isset($_SESSION['order'])){
          if($_SESSION['order']=='name'){
            echo 'checked';
          }
          }
        
        ?>
        />
        <label for="name">A-Z</label>

        <input type="radio"
        name="radOrder" 
        id="price"
        value="price"<?php
        if (isset($_SESSION['order'])){
          if ($_SESSION['order']=='price'){
            echo 'checked';
          }
        }
        ?>
        />
        <label for="price">Price</label>
      </p>
      <p>
        <label>Type:</label>
        <select name="typeList">
          <option value="All"<?php
          if (isset($_SESSION['type'])){
            if ($_SESSION['type']=='ALL'){
            echo 'selected';
          }
        }
        ?>>All</option>
        <option value="Bell" <?php
        if (isset($_SESSION['type'])){
            if ($_SESSION['type']=='Bell'){
            echo 'selected';
          }
        }
        ?>>Bell</option>
        <option value="Ballantine" <?php
        if (isset($_SESSION['type'])){
            if ($_SESSION['type']=='Ballantine'){
            echo 'selected';
          }
        }
        ?>>Ballantine</option>
        <option value="Jack Daniel" <?php
        if (isset($_SESSION['type'])){
            if ($_SESSION['type']=='Jack Daniel'){
            echo 'selected';
          }
        }
        ?>>Jack Daniel</option>
        J
        </select>
      </p>
      <label class="align" for="search">Search: </label>
      <input type="text" name="search" value="<?php
      if (isset($_SESSION['search'])) {
        echo $_SESSION['search'];
      }
      ?>"/>
    </br>
      <input type="submit" value="Submit" name="searchSubmit"/>
      <input type="reset" value="Clear"/>
      </fieldset>

      
    </form>
    <div class="test">
      <?php
      include './items/displayItems.php';
      ?>
    </div>