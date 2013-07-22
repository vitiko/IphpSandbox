<?php
// src/Iphpsandbox/PhotoBundle/Controller/PhotoController.php
namespace Iphpsandbox\PhotoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Iphpsandbox\PhotoBundle\Entity\Photo;
use Symfony\Component\HttpFoundation\Request;

class PhotoController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $photo = new Photo();
        $uploadForm = $this->createFormBuilder($photo)
            ->add('title')
            ->add('date', 'date')

        //Using standart field type
            ->add('photo', 'file')
            ->getForm();


        if ($request->isMethod('POST')) {
            $uploadForm->bind($request);

            if ($uploadForm->isValid()) {
                $em->persist($photo);
                $em->flush();
                return $this->redirect($this->generateUrl('iphpsandbox_photo'));
            }
        }

        return $this->render('IphpsandboxPhotoBundle:Photo:index.html.twig', array(
            'uploadForm' => $uploadForm->createView(),
            'photos' => $em->getRepository('IphpsandboxPhotoBundle:Photo')->findAll()
        ));
    }


    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $photo = $em->getRepository('IphpsandboxPhotoBundle:Photo')->findOneById($id);

        $editForm = $this->createFormBuilder($photo)
            ->add('title')
            ->add('date', 'date')

        //Using  field type with showing file/image info
            ->add('photo', 'iphp_file')
            ->getForm();


        if ($request->isMethod('POST')) {
            $editForm->bind($request);

            if ($editForm->isValid()) {
                $em->persist($photo);
                $em->flush();
                return $this->redirect($this->generateUrl('iphpsandbox_photo_edit', array ('id' => $photo->getId())));
            }
        }

        return $this->render('IphpsandboxPhotoBundle:Photo:edit.html.twig', array(

            'photo' => $photo,
            'editForm' => $editForm->createView(),
        ));

    }
}
