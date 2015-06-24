<?php

namespace Uneak\FlatSkinBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Validator\Constraints\Collection;
use Uneak\AdminBundle\Assets\ExternalCss;
use Uneak\AdminBundle\Assets\ExternalJs;
use Uneak\AdminBundle\Assets\ScriptFileTemplateJs;
use Uneak\AdminBundle\Form\AssetsAbstractType;
use Uneak\FlatSkinBundle\Form\DataTransformer\ChoiceToTagTransformer;
use Uneak\FlatSkinBundle\Form\DataTransformer\StringToChoiceArrayTransformer;
use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;

abstract class Select2Type extends AssetsAbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder->addEventListener(FormEvents::PRE_BIND, function (FormEvent $event) use ($options)  {

            if (!isset($options['options']['tags'])) {
                return;
            }

            $em = $options['em'];
            $class = $options['class'];
            $metaData = $em->getClassMetadata($class);
            $accessor = PropertyAccess::createPropertyAccessor();

            $property = $options['property'];
            $identifier = $metaData->getIdentifier()[0];

            $oData = $event->getData();
            $array = explode(",", $oData[0]);

            $rData = array();

            foreach ($array as $eTag) {
                $tag = $em->getRepository($class)->findOneBy(array($property => $eTag));
                if (!$tag) {
                    $tag = $metaData->getReflectionClass()->newInstance();
                    $accessor->setValue($tag, $property, $eTag);
                    $em->persist($tag);
                    $em->flush();
                }
                array_push($rData, $accessor->getValue($tag, $identifier));
            }

            $event->setData($rData);
        });
    }


    public function buildView(FormView $view, FormInterface $form, array $options)
    {

        $view->vars['options'] = $options['options'];
        if ($options['empty_value']) {
            $view->vars['options']['placeholder'] = $options['empty_value'];
            $view->vars['empty_value'] = "";
        }


        if (isset($view->vars['options']['tags'])) {

            $accessor = PropertyAccess::createPropertyAccessor();
            $property = $options['property'];
            $tags = $view->vars["data"];
            $rData = array();
            foreach ($tags as $tag) {
                array_push($rData, $accessor->getValue($tag, $property));
            }
            $view->vars["value"] = join(",", $rData);


            $view->vars['options']['tags'] = array();
            foreach ($view->vars['choices'] as $choice) {
                $view->vars['options']['tags'][] = $choice->label;
            }

            $view->vars['input'] = "hidden_widget";
        } else {
            $view->vars['input'] = "choice_widget";
        }

    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        $resolver->setDefaults(array(
            'options' => array(),
        ));

        $resolver->setDefined(
            array(
                'options',
            )
        );
    }


    public function getTheme()
    {
        return "UneakFlatSkinBundle:Form:select2/select2.html.twig";
    }


    protected function _registerExternalFile(FormView $formView)
    {
        $script = array();
        $script["select2_js"] = new ExternalJs("/vendor/select2/select2.js");

        if (isset($formView->vars["options"]["language"])) {
            $script["select2_language_js"] = new ExternalJs("/vendor/select2/select2_locale_" . $formView->vars["options"]["language"] . ".js", array("select2_js"), "", "text/javascript", "script", "UTF-8");
        }

        $script["select2_css"] = new ExternalCss("/vendor/select2/select2.css", null, "", "stylesheet");
        $script["select2_bootstrap_css"] = new ExternalCss("/vendor/select2-bootstrap-css/select2-bootstrap.css", array("select2_css"), "", "stylesheet");

        return $script;
    }


    protected function _registerScript(FormView $formView)
    {
        $script = array();
        $script["script_select2"] = new ScriptFileTemplateJs("UneakFlatSkinBundle:Form:select2/select2_script.html.twig", null, array('item' => $formView));

        return $script;
    }


}
