<?php

namespace BootStrapTwigForm;

/**
 * Description of BootStrapTwigForm
 *
 * @author Sébastien Dugene
 */
class FormController
{
    private $url = null;
    private $twig = null;
    private $form = null;
    private $root = __DIR__;
    private $formTarget = null;
    private $formMethod = 'POST';
    private $formButtonText = 'Validate';
    private $formId = 'bootstrapTwigForm';
    private $formClass = 'bootstrapTwigForm';
    
    public function __construct(){}
    
    public function render()
    {
        if (is_null($this->twig)) $this->getTwig();
        
        $array = [
            'form' => $this->form,
            'params' => [
                'url' => $this->url,
                'formId' => $this->formId,
                'formClass' => $this->formClass,
                'formMethod' => $this->formMethod,
                'formTarget' => $this->formTarget,
                'formButtonText' => $this->formButtonText
            ]
        ];
        
        if (!is_null($this->form)) {
            $form = $this->twig->render('bootStrapTwigForm/form.html.twig', $array);
        } else {
            $form = 'form array is not defined';
        }
        return $form;
    }
    
    public function setUrl($url = null)
    {
        $this->url = $url;
        return $this;
    }
    
    public function setFormButtonText($formButtonText = 'Validate')
    {
        $this->formButtonText = $formButtonText;
        return $this;
    }
    
    public function setFormId($formId = 'bootstrapTwigForm')
    {
        $this->formId = $formId;
        return $this;
    }
    
    public function setFormClass($formClass = 'bootstrapTwigForm')
    {
        $this->formClass= $formClass;
        return $this;
    }
    
    public function setFormTarget($formTarget = null)
    {
        $this->formTarget = $formTarget;
        return $this;
    }
    
    public function setFormMethod($formMethod = 'POST')
    {
        $this->formMethod = $formMethod;
        return $this;
    }
    
    public function setForm($form)
    {
        $this->form = $form;
        return $this;
    }
    
    public function setTwig($twig)
    {
        $this->twig = $twig;
        return $this;
    }
    
    private function getTwig()
    {
        \Twig_Autoloader::register();

        $loader = new \Twig_Loader_Filesystem($this->root.'/views');
        $this->twig = new \Twig_Environment($loader, [
            'debug' => true
        ]);
    }
    
}