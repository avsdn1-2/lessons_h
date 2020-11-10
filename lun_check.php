<?php

//формируем и выводим форму
class FormConstructor
{
    private $fields = [];

    public function __set($propertyName, $value)
    {
        $this->fields[$propertyName] = $value;
    }

    public function render()
    {
        $formHtml = '<form method="POST" action="process.php">';
        foreach ($this->fields as $name => $value) {
            $formHtml .= sprintf(
                '<input type="text" name="%s" value="%s"/>', $name, $value
            );
        }
        $formHtml .= '<input type="submit" name="submit" value="Send">';
        $formHtml .= '</form>';

        return $formHtml;
    }
}

$formConstructor = new FormConstructor();

$formConstructor->card_number = 'card number';

echo $formConstructor->render();





