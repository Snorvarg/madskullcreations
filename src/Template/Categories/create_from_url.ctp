<?php 
/* Create form for Categories.
 * 
 */

echo $this->TinyMCE->GetScript();
?>

<h1><?= __("Create Page") ?></h1>

<?php
    $urlTitle = array_pop($path);

    echo $this->Form->create();

    if(count($path) > 0)
    {
?>
<div class="callout primary" data-closable>
  <?php
    echo '<p>'.__('When creating this page, the following parent pages will be created if they don\'t already exist').':</p>';
    
    echo '<ul>';
    foreach($path as $ut)
    {
      echo '<li>'.$ut.'</li>';
    }
    echo '</ul>';
  ?>
</div>
<?php      
    }
    
    $options = [
            'options' => $availableLanguageCodes, 
            'label' => __('The page will be created in the selected language'),
            'empty' => __('Select a language..'),
            'value' => $i18n
        ];

    echo $this->Form->input(
        'i18n', 
        $options);
        
    $arr = ['title' => __('The url title is visible in the browsers address bar.'), 'value' => $urlTitle];
    if($urlTitle == 'home' && count($path) == 0)
    {
      echo '<p class="callout">'.__('You cannot change the Url Title of the starting page. It must always have the name "home". However, you can change the Title, visible in the menus.').'</p>';
      
      $arr['value'] = 'home';
     

      echo $this->Form->hidden('url_title', $arr);
    }
    else
    {
      echo $this->Form->input('url_title', $arr);
    }

    echo $this->Form->input('title', ['title' => __('The title is visible in the menus.'), 'value' => ucfirst($urlTitle)]);
    
    echo $this->Form->input('content', ['type' => 'textarea']);

  ?>
  <br>
  <?php
    echo $this->element('LayoutSelector', ['defaultLayout' => $defaultLayout, 'layoutFiles' => $layoutFiles]);
    echo $this->Form->button(__('Save Page'), ['class' => 'button top-margin']);
    echo $this->Form->end();
?>