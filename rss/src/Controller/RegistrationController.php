<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class RegistrationController
 *
 * @package App\Controller
 */
class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="registration_register")
     *
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     *
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('main_rss_list');
        }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('security_login');
        }

        return $this->render('registration/register.html.twig',
            [
                'registrationForm' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/check-email", name="registration_check_eamil", methods={"POST"})
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     *
     * @return JsonResponse
     */
    public function checkEmail(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $registrationFrom = $request->get('registration_form');
        $email = $registrationFrom['email'] ?? null;

        if (!$email) {
            return $this->json(['Value is required']);
        }

        $emailEntity = $entityManager
            ->getRepository(User::class)
            ->findOneBy(['email' => $email]);

        if ($emailEntity) {
            return $this->json(['Email already registered']);
        }

        return $this->json(true);
    }
}
