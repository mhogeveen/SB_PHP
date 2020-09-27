<form method="post" action="<?php submit_post() ?>" enctype="multipart/form-data">
   <h2 class="form__title">Plaats een blog bericht</h2>

   <!-- Form item Title -->
   <div class="form__item item--title">
      <label>Berichtnaam</label>
      <input name='titleInput' placeholder="Geen titel" type="text" required />
   </div>

   <!-- Form item Category -->
   <div class="form__item item--category">
      <label>Categorie</label>
      <select name='categoryInput' required>
         <option value="" disabled selected>Geen categorie</option>
         <?php
         $categories = get_categories(array(
            'hide_empty'      => 0,
         ));
         foreach ($categories as $category) {
            echo '<option value="' . $category->term_id . '">' . $category->cat_name . '</option>';
         }
         ?>
      </select>
   </div>

   <!-- Form item Image -->
   <div class="form__item item--image">
      <label>Header afbeelding</label>
      <div class="image-input">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path>
         </svg>
         <span>Kies bestand</span>
         <input type="file" name='imageInput' required />
      </div>
   </div>

   <!-- Form item Message -->
   <div class="form__item item--message">
      <label>Bericht</label>
      <textarea name='messageInput' rows="14" cols="30" required></textarea>
   </div>

   <!-- Form submit button -->
   <button type='submit' name='submitPost' class="btn">Bericht aanmaken</button>

</form>