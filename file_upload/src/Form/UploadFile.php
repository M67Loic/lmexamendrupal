<?php
namespace Drupal\file_upload\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\State\StateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Implements a file_upload form
 */

class UploadFile extends FormBase
{
	/**
	 * {@inheritdoc}.
	 */
	public function getFormID(){
		return 'file_upload_form';
	}
	/**
	 * {@inheritdoc}.
	 */
	public function buildForm(array $form, FormStateInterface $form_state){
    // Champs pour afficher le résultat du calcul
            if (isset($form_state->getRebuildInfo()['result'])) {
                $form['result']= [
                    '#markup' => '<h2>'.$this->t('OK').'</h2>',
                ];
            }
        
            
            $form['document_upload']['file_up'] = [
                '#type' => 'managed_file',
                '#upload_location' => '/file_upload/file_up/',
                '#multiple' => FALSE,
                'description' => t('Allowed extention : pdf'),
                '#upload_validators' => [
                    'file_validate_is_file' => array(),
                    'file_validate_extensions' => array('pdf'),
                    'file_validate_size' => array(1000000),
                ],
                '#title' => t('Upload a pdf documents'),
            ];


       

    function validateForm(array &$form, FormStateInterface $form_state){
        $manageFieldId = $form_state->getValue(['document_upload' => 'file_up']);

        if (empty($manageFieldId)) {
            $form_state->setErrorByName('test','No document found !');
        }
    }
	

}