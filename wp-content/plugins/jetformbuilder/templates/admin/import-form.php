<a href="#" class="page-title-action" id="<?= $this->get_id(); ?>-trigger"><?= $this->get_title(); ?></a><form id="<?= $this->get_id(); ?>" style="display: none; margin: -0 0 0 20px; padding: 5px 15px; align-items: center; background: #fff;" method="post" action="<?= $this->action_url(); ?>" enctype="multipart/form-data"><input type="file" name="form_file" accept="application/json" multiple="false"><button class="button button-primary" type="submit" style="margin: 0 0 0 5px;"><?= $import_button; ?></button></form>