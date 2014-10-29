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
                new Symfony\Bundle\FrameworkBundle\FrameworkBundle,
                new Symfony\Bundle\TwigBundle\TwigBundle,
                new Symfony\Bundle\MonologBundle\MonologBundle,
                new AppBundle\AppBundle,
            ];

            if(in_array($this->getEnvironment(), ['dev', 'test'])) {
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
            $loader->load(__DIR__ . '/config/config.yml');

            if(in_array($this->getEnvironment(), ['dev', 'test'])) {
                $loader->load(function ($container) {
                    $container->loadFromExtension('web_profiler', [
                        'toolbar' => true,
                    ]);
                });
            }
        }

    }
