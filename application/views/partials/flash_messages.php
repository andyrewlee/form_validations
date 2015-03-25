<div id='errors'>
<?php 
  if($this->session->flashdata('errors'))
  {
    foreach($this->session->flashdata('errors') as $value)
    { ?>
      <p><?= $value ?></p>
<?php   }
    } ?>
</div>
<div id='success'>
<?php 
  if($this->session->flashdata('success'))
  {
    foreach($this->session->flashdata('success') as $value)
    { ?>
      <p><?= $value ?></p>
<?php
    }
  } ?>
</div>
