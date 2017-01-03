<?php
namespace MyApp\FilmothequeBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAwareInterface,
    Symfony\Component\DependencyInjection\ContainerAwareTrait;


class FilmController implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function listerAction()
    {
        $em = $this->container->get('doctrine')->getManager();
        $films = $em->getRepository('MyAppFilmothequeBundle:Film')->findAll();

        return $this->container->get('templating')->renderResponse('MyAppFilmothequeBundle:Film:lister.html.twig',array(
                'films' => $films)
        );
    }

}