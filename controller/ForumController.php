<?php

namespace Controller;

use App\Session;
use App\Router;
use Model\Manager\TopicManager;
use Model\Manager\CategorieManager;
use Model\Manager\MessageManager;
use Model\Manager\UtilisateurManager;

class ForumController
{

    public function index()
    {
        Router::redirectTo("home", "index");
    }

    /**
     * Afficher les posts d'un topic
     */
    public function show()
    {

        $id = (isset($_GET['id'])) ? $_GET['id'] : null;
        $manTopic = new TopicManager();
        // $manPost = new PostManager();

        $topic = $manTopic->findOneById($id);
        // $posts = $manPost->findByTopic($id);

        return [
            "view" => "forum/posts.php",
            "data" => [
                "topic" => $topic,
                // "posts" => $posts,
            ],
            "titrePage" => "FORUM | " . $topic
        ];
    }

    /**
     * Afficher toute les catégories
     */
    public function listCategories()
    {

        $manCategorie = new CategorieManager();
        $cat = $manCategorie->findAll();

        return [
            "view" => "forum/ListCategorie.php",
            "data" => [
                "categories" => $cat
            ],
            "titrePage" => "FORUM-VT | Catégories"
        ];
    }

    /**
     * Afficher tout les sujets d'une catégorie
     */
    public function detailCategories()
    {

        $id = (isset($_GET['id'])) ? $_GET['id'] : null;
        $manTopic = new TopicManager();
        $manCategorie = new CategorieManager();

        $topic = $manTopic->findById($id);
        $cat = $manCategorie->findOneById($id);

        return [
            "view" => "forum/cat.php",
            "data" => [
                "topic" => $topic,
                "categorie" => $cat,
            ],
            "titrePage" => "FORUM | "
        ];
    }

    /**
     * Afficher tout les topics
     */
    public function listTopics()
    {

        $manTopics = new TopicManager();
        $topics = $manTopics->findAll();

        return [
            "view" => "forum/ListTopics.php",
            "data" => [
                "topics" => $topics
            ],
            "titrePage" => "FORUM-VT | Topics"
        ];
    }

    /**
     * Afficher tout les messages d'un topic
     */
    public function detailTopics()
    {
        $id = (isset($_GET['id'])) ? $_GET['id'] : null;
        $manMessage = new MessageManager();
        $manTopic = new TopicManager();

        $mess = $manMessage->findById($id);
        $topic = $manTopic->findOneById($id);

        return [
            "view" => "forum/topic.php",
            "data" => [
                "message" => $mess,
                "topic" => $topic
            ],
            "titrePage" => "FORUM | "
        ];
    }

    /**
     * Afficher tout les messages
     */
    public function listMessages()
    {

        $manMessages = new MessageManager();
        $mes = $manMessages->lastMessages();

        return [
            "view" => "forum/ListMessages.php",
            "data" => [
                "messages" => $mes
            ],
            "titrePage" => "FORUM-VT | Messages"
        ];
    }

    /**
     * Afficher tout les utilisateurs
     */
    public function listUtilisateurs()
    {

        $manUtilisateurs = new UtilisateurManager();
        $users = $manUtilisateurs->findAll();

        // foreach($users as $user){
        //     $date = date_format($user->getDateCreationUtilisateur(), '%e/%m/%Y');
        //     $user->setDateCreationUtilisateur($date);
        // }

        return [
            "view" => "forum/ListUtilisateurs.php",
            "data" => [
                "utilisateurs" => $users
            ],
            "titrePage" => "FORUM-VT | Utilisateurs"
        ];
    }

    public function addTopicPage()
    {
        $catManager = new CategorieManager();
        $listCat = $catManager->findAll();

        return [
            "view" => "forum/addTopicForm.php",
            "data" => ["categories" => $listCat],
            "titrePage" => "FORUM | Création d'un topic"
        ];
    }

    public function addTopic()
    {
        $topicManager = new TopicManager();

        foreach ($_POST as $key => $value) {
            if (!empty($value)) {
                ${$key} = $value;
            } else {
                echo "ERREUR";
            }
        }

        $id = $_POST['categorie_id'];
        $titre = filter_input(INPUT_POST, 'titreTopic', FILTER_SANITIZE_STRING);
        $msgTopic = filter_input(INPUT_POST, 'textTopic', FILTER_SANITIZE_STRING);
        $user = Session::getUser()->getId();

        $params = [
            ":categorie_id" => $id,
            ":titreTopic" => $titre,
            ":textTopic" => $msgTopic,
            ":utilisateur_id" => $user
        ];

        if ($topicManager->addTopic($params)) {
            $message = "SUCCES !";
        } else {
            $message = "ERREUR !";
        }

        return [
            "view" => "forum/listTopics.php",
            "data" => [
                "message" => $message
            ],
            "titrePage" => "FORUM | Création d'un topic"
        ];
    }

    public function deleteTopic()
    {
        $topicManager = new TopicManager();
        $id = (isset($_GET['id'])) ? $_GET['id'] : null;

        $topicManager->deleteMessFromTopic($id);
        $topicManager->deleteTopic($id);

        return [
            "view" => "forum/home.php"
        ];
    }
}
