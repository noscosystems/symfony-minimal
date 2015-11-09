<?php
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    /**
     * Register Bundles
     *
     * @access public
     * @return Symfony\Component\HttpKernel\Bundle\Bundle[]
     */
    public function registerBundles()
    {
        $bundles = [
            // The default Symfony2 FrameworkBundle implements a basic but robust and flexible MVC framework.
            // If you want really useful annotations in your Controllers, also include the SensioFrameworkExtraBundle.
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle,
            // A bundle to integrate the Twig templating engine into Symfony. Once enabled in the config, views can
            // be rendered through Twig.
            new Symfony\Bundle\TwigBundle\TwigBundle,
            // You've got to integrate a logging library. Logs are important. Go read 12factor.net now.
            new Symfony\Bundle\MonologBundle\MonologBundle,

            // And finally: the bundle that contains all our applications logic.
            // Read Symfony's Best Practices as to why we name this just "AppBundle" without a vendor namespace.
            new AppBundle\AppBundle,
        ];
        // If we are in the "dev" or "test" environment, include the bundle for the web debug toolbar/profiler.
        if (in_array($this->getEnvironment(), ['dev', 'test'])) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
        }
        return $bundles;
    }

    /**
     * Register Container Configuration
     *
     * @access public
     * @param Symfony\Component\Config\Loader\LoaderInterface $loader
     * @return void
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        // Load our application's configuration.
        $loader->load(__DIR__ . '/config/config.yml');
        // If we are in the "dev" or "test" environment, then also load the configuration for the web debug
        // toolbar/profiler. Specifically, we are saying that we want to enable it because we already loaded it
        // above in the registerBundles() method.
        if (in_array($this->getEnvironment(), ['dev', 'test'])) {
            // We could put this in a separate file, like we have split routing into "routing_dev" and
            // "routing_prod", as the standard edition does, but whole new file compared to a couple of lines? Might
            // as well keep it here until it needs to get more complicated, plus it shows that you can modify the
            // configuration on-the-fly if need be.
            $loader->load(function ($container) {
                $container->loadFromExtension('web_profiler', [
                    'toolbar' => true,
                ]);
            });
        }
    }
}
