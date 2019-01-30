<?php
namespace Product\InputFilter;

use Zend\InputFilter\InputFilter;

class FormProductFilter extends InputFilter
{
  public function __construct()
  {
    $this->add([
      'name'       => 'id',
      'required'   => false,
      'allowEmpty' => false,
      'filters'    => [
      ],
      'validators' => [
      ],
    ]);
    $this->add([
      'name' => 'name',
      'required' => true,
      'filters' => [
        ['name' => 'StripTags'],
        ['name' => 'StringTrim'],
      ],
      'validators' => [
        [
          'name' => 'StringLength',
          'options' => [
            'min' => 1,
            'max' => 50,
          ],
        ],
      ],
    ]);

    $this->add([
      'name' => 'description',
      'required' => true,
      'filters' => [
        ['name' => 'StripTags'],
        ['name' => 'StringTrim'],
      ],
      'validators' => [
        [
          'name' => 'StringLength',
          'options' => [
            'min' => 5,
            'max' => 255,
          ],
        ],
      ],
    ]);

    // $inputFilter->add([
    //   'type'     => 'Zend\InputFilter\FileInput',
    //   'name'     => 'img',
    //   'required' => true,
    //   'validators' => [
    //     ['name'    => 'FileUploadFile'],
    //     [
    //       'name'    => 'FileMimeType',
    //       'options' => [
    //         'mimeType'  => ['image/jpeg', 'image/png']
    //       ]
    //     ],
    //     ['name'    => 'FileIsImage'],
    //     [
    //       'name'    => 'FileImageSize',
    //       'options' => [
    //         'minWidth'  => 128,
    //         'minHeight' => 128,
    //         'maxWidth'  => 4096,
    //         'maxHeight' => 4096
    //       ]
    //     ],
    //   ],
    //   'filters'  => [
    //     [
    //       'name' => 'FileRenameUpload',
    //       'options' => [
    //         'target' => './data/upload',
    //         'useUploadName' => true,
    //         'useUploadExtension' => true,
    //         'overwrite' => true,
    //         'randomize' => false
    //       ]
    //     ]
    //   ],
    // ]);
  }
}
