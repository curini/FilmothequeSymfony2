<?php
namespace MyApp\FilmothequeBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAwareInterface,
    Symfony\Component\DependencyInjection\ContainerAwareTrait;


class CategoryController implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function listerAction()
    {
        $em = $this->container->get('doctrine')->getManager();
        $categories = $em->getRepository('MyAppFilmothequeBundle:Category')->findAll();

        return $this->container->get('templating')->renderResponse('MyAppFilmothequeBundle:Category:lister.html.twig',array(
                'categories' => $categories)
        );
    }

}