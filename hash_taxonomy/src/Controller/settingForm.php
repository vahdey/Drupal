<?php

namespace Drupal\hash_taxonomy\Controller;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;



class settingForm extends FormBase{
    
    protected function getEditableConfigNames() {
        return ['hash_taxonomy.setting_form'];
    }

    public function getFormId() {
        return 'setting_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['vocab_name'] = array(
            '#type' => 'textfield',
            '#title' => t('Vocabulary Name:'),
            '#required' => TRUE,
        );

        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Save'),
            '#button_type' => 'primary',
        );

        return $form;//submit button of form
    }



    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        /*foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);

        }*/
        $vocab = $form_state->getValue('vocab_name');
        hash_taxonomy_vocab_name($vocab);
    }

}
