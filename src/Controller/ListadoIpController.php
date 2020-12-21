<?php

namespace App\Controller;

use App\Entity\Usuarioconip;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Router;


class ListadoIpController extends AbstractController
{
    /**
     * @Route("/listado/ip", name="listado_ip")
     */
    public function index(Request $request,UserPasswordEncoderInterface $passwordEncoder): Response
    {
       $em = $this->getDoctrine()->getManager();

        $requestContext = new RequestContext($_SERVER['REQUEST_URI']);

        $locator = new FileLocator(array(APP_PATH . 'config/'));
        $loader = new YamlFileLoader($locator);

        $options = array(
            'cache_dir' => __DIR__.'/cache', //directorio donde serán cacheadas las rutas
            'debug' => true, //solo regenera la caché en debug, en producción debe ser false para mejor rendimiento
        );

        $router = new Router($loader, 'routes.yml', $options, $requestContext);
        //esta clase espera el loader, que puede ser para xml, yml, php ó anotaciones
        // espera el archivo que contiene las rutas en un formato acorde al loader usado
        // espera un arreglo de opciones
        // y espera el requestContext

        //el router encuentra la ruta correspondientes a cada request
        try{
            $parameters = $router->match('/ip');
        }catch(ResourceNotFoundException $e){

        }

        // tambien permite generar url para las rutas
        $em->getRepository(Usuarioconip::class)->findAll();


        return $this->render('listado_ip/index.html.twig', [
            'ip' => 'ip',
            'Controller' =>'ListadoIpController'
        ]);
    }
}
