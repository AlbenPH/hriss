<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\HumanResource\Entities\Gender;
use Illuminate\Support\Str;
use App\Models\Lang;

class LangSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $langs = [
            ['name' => 'English', 'value' => 'en'],
            ['name' => 'Afar', 'value' => 'aa'],
            ['name' => 'Abkhazian', 'value' => 'ab'],
            ['name' => 'Afrikaans', 'value' => 'af'],
            ['name' => 'Amharic', 'value' => 'am'],
            ['name' => 'Arabic', 'value' => 'ar'],
            ['name' => 'Assamese', 'value' => 'as'],
            ['name' => 'Aymara', 'value' => 'ay'],
            ['name' => 'Azerbaijani', 'value' => 'az'],
            ['name' => 'Bashkir', 'value' => 'ba'],
            ['name' => 'Belarusian', 'value' => 'be'],
            ['name' => 'Bulgarian', 'value' => 'bg'],
            ['name' => 'Bihari', 'value' => 'bh'],
            ['name' => 'Bislama', 'value' => 'bi'],
            ['name' => 'Bengali/Bangla', 'value' => 'bn'],
            ['name' => 'Tibetan', 'value' => 'bo'],
            ['name' => 'Breton', 'value' => 'br'],
            ['name' => 'Catalan', 'value' => 'ca'],
            ['name' => 'Corsican', 'value' => 'co'],
            ['name' => 'Czech', 'value' => 'cs'],
            ['name' => 'Welsh', 'value' => 'cy'],
            ['name' => 'Danish', 'value' => 'da'],
            ['name' => 'German', 'value' => 'de'],
            ['name' => 'Bhutani', 'value' => 'dz'],
            ['name' => 'Greek', 'value' => 'el'],
            ['name' => 'Esperanto', 'value' => 'eo'],
            ['name' => 'Spanish', 'value' => 'es'],
            ['name' => 'Estonian', 'value' => 'et'],
            ['name' => 'Basque', 'value' => 'eu'],
            ['name' => 'Persian', 'value' => 'fa'],
            ['name' => 'Finnish', 'value' => 'fi'],
            ['name' => 'Fiji', 'value' => 'fj'],
            ['name' => 'Faeroese', 'value' => 'fo'],
            ['name' => 'French', 'value' => 'fr'],
            ['name' => 'Frisian', 'value' => 'fy'],
            ['name' => 'Irish', 'value' => 'ga'],
            ['name' => 'Scots/Gaelic', 'value' => 'gd'],
            ['name' => 'Galician', 'value' => 'gl'],
            ['name' => 'Guarani', 'value' => 'gn'],
            ['name' => 'Gujarati', 'value' => 'gu'],
            ['name' => 'Hausa', 'value' => 'ha'],
            ['name' => 'Hindi', 'value' => 'hi'],
            ['name' => 'Croatian', 'value' => 'hr'],
            ['name' => 'Hungarian', 'value' => 'hu'],
            ['name' => 'Armenian', 'value' => 'hy'],
            ['name' => 'Interlingua', 'value' => 'ia'],
            ['name' => 'Interlingue', 'value' => 'ie'],
            ['name' => 'Inupiak', 'value' => 'ik'],
            ['name' => 'Indonesian', 'value' => 'in'],
            ['name' => 'Icelandic', 'value' => 'is'],
            ['name' => 'Italian', 'value' => 'it'],
            ['name' => 'Hebrew', 'value' => 'iw'],
            ['name' => 'Japanese', 'value' => 'ja'],
            ['name' => 'Yiddish', 'value' => 'ji'],
            ['name' => 'Javanese', 'value' => 'jw'],
            ['name' => 'Georgian', 'value' => 'ka'],
            ['name' => 'Kazakh', 'value' => 'kk'],
            ['name' => 'Greenlandic', 'value' => 'kl'],
            ['name' => 'Cambodian', 'value' => 'km'],
            ['name' => 'Kannada', 'value' => 'kn'],
            ['name' => 'Korean', 'value' => 'ko'],
            ['name' => 'Kashmiri', 'value' => 'ks'],
            ['name' => 'Kurdish', 'value' => 'ku'],
            ['name' => 'Kirghiz', 'value' => 'ky'],
            ['name' => 'Latin', 'value' => 'la'],
            ['name' => 'Lingala', 'value' => 'ln'],
            ['name' => 'Laothian', 'value' => 'lo'],
            ['name' => 'Lithuanian', 'value' => 'lt'],
            ['name' => 'Latvian/Lettish', 'value' => 'lv'],
            ['name' => 'Malagasy', 'value' => 'mg'],
            ['name' => 'Maori', 'value' => 'mi'],
            ['name' => 'Macedonian', 'value' => 'mk'],
            ['name' => 'Malayalam', 'value' => 'ml'],
            ['name' => 'Mongolian', 'value' => 'mn'],
            ['name' => 'Moldavian', 'value' => 'mo'],
            ['name' => 'Marathi', 'value' => 'mr'],
            ['name' => 'Malay', 'value' => 'ms'],
            ['name' => 'Maltese', 'value' => 'mt'],
            ['name' => 'Burmese', 'value' => 'my'],
            ['name' => 'Nauru', 'value' => 'na'],
            ['name' => 'Nepali', 'value' => 'ne'],
            ['name' => 'Dutch', 'value' => 'nl'],
            ['name' => 'Norwegian', 'value' => 'no'],
            ['name' => 'Occitan', 'value' => 'oc'],
            ['name' => '(Afan)/Oromoor/Oriya', 'value' => 'om'],
            ['name' => 'Punjabi', 'value' => 'pa'],
            ['name' => 'Polish', 'value' => 'pl'],
            ['name' => 'Pashto/Pushto', 'value' => 'ps'],
            ['name' => 'Portuguese', 'value' => 'pt'],
            ['name' => 'Quechua', 'value' => 'qu'],
            ['name' => 'Rhaeto-Romance', 'value' => 'rm'],
            ['name' => 'Kirundi', 'value' => 'rn'],
            ['name' => 'Romanian', 'value' => 'ro'],
            ['name' => 'Russian', 'value' => 'ru'],
            ['name' => 'Kinyarwanda', 'value' => 'rw'],
            ['name' => 'Sanskrit', 'value' => 'sa'],
            ['name' => 'Sindhi', 'value' => 'sd'],
            ['name' => 'Sangro', 'value' => 'sg'],
            ['name' => 'Serbo-Croatian', 'value' => 'sh'],
            ['name' => 'Singhalese', 'value' => 'si'],
            ['name' => 'Slovak', 'value' => 'sk'],
            ['name' => 'Slovenian', 'value' => 'sl'],
            ['name' => 'Samoan', 'value' => 'sm'],
            ['name' => 'Shona', 'value' => 'sn'],
            ['name' => 'Somali', 'value' => 'so'],
            ['name' => 'Albanian', 'value' => 'sq'],
            ['name' => 'Serbian', 'value' => 'sr'],
            ['name' => 'Siswati', 'value' => 'ss'],
            ['name' => 'Sesotho', 'value' => 'st'],
            ['name' => 'Sundanese', 'value' => 'su'],
            ['name' => 'Swedish', 'value' => 'sv'],
            ['name' => 'Swahili', 'value' => 'sw'],
            ['name' => 'Tamil', 'value' => 'ta'],
            ['name' => 'Telugu', 'value' => 'te'],
            ['name' => 'Tajik', 'value' => 'tg'],
            ['name' => 'Thai', 'value' => 'th'],
            ['name' => 'Tigrinya', 'value' => 'ti'],
            ['name' => 'Turkmen', 'value' => 'tk'],
            ['name' => 'Tagalog', 'value' => 'tl'],
            ['name' => 'Setswana', 'value' => 'tn'],
            ['name' => 'Tonga', 'value' => 'to'],
            ['name' => 'Turkish', 'value' => 'tr'],
            ['name' => 'Tswana', 'value' => 'ts'],
            ['name' => 'Tatar', 'value' => 'tt'],
            ['name' => 'Twi', 'value' => 'tw'],
            ['name' => 'Ukrainian', 'value' => 'uk'],
            ['name' => 'Urdu', 'value' => 'ur'],
            ['name' => 'Uzbek', 'value' => 'uz'],
            ['name' => 'Vietnamese', 'value' => 'vi'],
            ['name' => 'Volapük', 'value' => 'vo'],
            ['name' => 'Wolof', 'value' => 'wo'],
            ['name' => 'Xhosa', 'value' => 'xh'],
            ['name' => 'Yoruba', 'value' => 'yo'],
            ['name' => 'Chinese', 'value' => 'zh'],
            ['name' => 'Zulu', 'value' => 'zu'],
        ];
        
        foreach ($langs as $lang) {
            Lang::create([
                'name' => $lang['name'],
                'value' => $lang['value']
            ]);
        }
    }
}