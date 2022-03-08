<?php 

namespace Drupal\cervical_screening\Plugin\Shortcode;

use Symfony\Component\Yaml\Yaml;
use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * Provides a shortcode for creating lists.
 *
 * @Shortcode(
 *   id = "cervical",
 *   title = @Translation("Cervical cancer screening tool shortcode"),
 *   description = @Translation("Cervical cancer screening tool shortcode")
 * )
 */
class CervicalShortcode extends ShortcodeBase {

    /**
     * {@inheritdoc}
     */
    public function process(array $attributes, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
      
        $output = [
          '#theme' => 'cervical',
          '#attached' => [
            'library' => [
              'cervical_screening/cervical'
            ],
          ],
        ];

        // https://drupal.stackexchange.com/questions/222668/attaching-libraries-in-modules/222674#222674
        // ShortcodeBase render method calls renderPlain which will strip attached libraries
        $renderer = \Drupal::service('renderer');
        $output = $renderer->render($output);
        return $output;
    }
  
    /**
     * {@inheritdoc}
     */
    public function tips($long = FALSE) {
      $output = [];
      $output[] = '<p><strong>' . $this->t('[cervical]This tag can be empty[/cervical]') . '</strong> ';
  
      return implode(' ', $output);
    }
  
  }
  