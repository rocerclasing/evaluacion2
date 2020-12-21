<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Router;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;

class EditarIpController extends AbstractController
{
    /**
     * @Route("/editar/ip", name="editar_ip")
     */
    public function index(Request $request): Response
    {
        $bandera =true;

        $requestContext = new RequestContext($_SERVER['REQUEST_URI']);
        $locator = new FileLocator(array(APP_PATH . 'config/'));
        $loader = new YamlFileLoader($locator);

        $options = array(
            'cache_dir' => __DIR__.'/cache', //directorio donde serán cacheadas las rutas
            'debug' => true, //solo regenera la caché en debug, en producción debe ser false para mejor rendimiento
        );

        $router = new Router($loader, 'routes.yml', $options, $requestContext);
        try{

            $parameters = $router->match('/ip/editar/2');

        }catch(ResourceNotFoundException $e){
            //cuando no se encuentra ninguna concordancia, se lanza esta excepcion
        }

        //para este comando funcione usted tiene que registrar 3 usuarios con distintos ip en la bd

        $url = $router->generate('ip_editar', array('id' => 3));
        if($url == $bandera)
        {
            echo'Se ha modificado';

        }
        else
        {
            echo'No se ha modificado';
        }


        return $this->render('editar_ip/index.html.twig', [
            'controller_name' => 'EditarIpController',
        ]);


    }
}
