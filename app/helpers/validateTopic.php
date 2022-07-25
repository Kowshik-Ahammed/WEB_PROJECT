<?php

function validateTopic($topic)
{
   
    $errors = array();

    
    if (empty($topic['name'])) {
        array_push ($errors, 'Name is required');
    }

    

   // $existingTopic = selectone('topics', ['name' => $topic['name']] );
    //if ($existingTopic) {

    //    array_push ($errors, 'Name already exists');
    //}

    $existingTopic = selectone('topics', ['name' => $topic['name']] );
    if ($existingTopic) {

        if (isset($post['update-topic']) && $existingTopic['id'] != $post['id']) {

            array_push ($errors, 'Name already exists');

        }
        if (isset($post['add-topic'])) {

            array_push ($errors, 'Name already exists');
            
        }

        
    }

    return $errors;


}



