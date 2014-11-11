<?php

    /**
     * Annotations Example
     * ===================
     *
     * The purpose of this file is to show off Symfony's controller/action annotations. These are not actually available
     * in the minimal distribution so the controller won't work as expected, but are available in the standard
     * distribution when Sensio's FrameworkExtraBundle is enabled in the AppKernel.
     *
     * My personal preference, however, is to *not* use the @Route (and therefore @Method) annotation. Even though it is
     * recommended by Symfony's Best Practices eBook, I believe routing should treated the same as configuration; as the
     * URL is visible to the end-user, it should be grouped with UI and UX design and decoupled from back-end business
     * logic.
     */

    namespace AppBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter as Param;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use AppBundle\Entity\Post as PostEntity;

    /**
     * Prefix this entire controller with the URI "/blog/".
     *
     * @Route("/blog")
     */
    class BlogController extends Controller
    {

        /**
         * Action: Index
         *
         * @access public
         * @param Symfony\Component\HttpFoundation\Request $request
         * @param AppBundle\Entity\Post $post
         * @Route("/{year}/{month}/{post_slug}",
         *     requirements={
         *         "year" = "\d{4}",
         *         "month" = "\d{2}",
         *         "title" = "[a-z0-9]([a-z0-9-]*[a-z0-9])?"
         *     }
         * )
         * @Method({"GET", "POST"})
         * @ParamConverter("post",
         *     class="AppBundle:Post",
         *     options={
         *         mapping: {"slug": "post_slug"}
         *     }
         * )
         * @Security("is_granted('POST_SHOW', post)")
         * @Cache(expires="tomorrow", public=true)
         * @Template("AppBundle:Blog:show.html.twig")
         * @return Symfony\Component\HttpFoundation\Response
         */
        public function showAction(Request $request, PostEntity $post)
        {
            // Return these variables to the template.
            return ['post' => $post];
        }

    }
