# People Module for [Hogan](https://github.com/dekodeinteraktiv/hogan-core)

## Installation
Install the module using Composer `composer require dekodeinteraktiv/hogan-people` or simply by downloading this repository and placing it in `wp-content/plugins`

## Usage
… TODO

## Available filters

### Admin
- `hogan/module/people/content/tabs` : Wysiwyg show tabs or not. Default: 'all'.
- `hogan/module/people/content/toolbar` : Wysiwyg show tabs or not. Default: 'hogan'.

### Template
- `hogan/module/people/image_wrapper_classes` : Add classes names to the image wrapper div tag. Default: empty array
- `hogan/module/people/image_size` : Hook for image size. Default: 'medium'.
- `hogan/module/people/image_attr` : Attributes for the image markup. Default empty.

## Available actions
- `hogan/module/people/before_description` : Runs before description is rendered.
