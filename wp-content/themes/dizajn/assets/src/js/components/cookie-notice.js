import * as CookieConsent from "vanilla-cookieconsent";

function runCookieNotice() {
    let ccOptions = {
        guiOptions: {
            consentModal: {
                layout: 'bar',
                position: 'bottom right',
                flipButtons: false,
                equalWeightButtons: false
            },
            preferencesModal: {
                layout: 'cloud',
                // position: 'left right',
                flipButtons: false,
                equalWeightButtons: false
            }
        },
        categories: {
            necessary: {
                enabled: true,
                readOnly: true
            },
            embed: {
                enabled: false,
                readOnly: false
            },
            marketing: {
                enabled: false,
                readOnly: false
            },
            analytics: {
                enabled: false,
                readOnly: false,
                autoClear: {
                    cookies: [
                        {name: /^_ga/},
                        {name: '_gid'}
                    ]
                }
            }
        },
        language: {
            default: 'bs',
            translations: {
                bs: {
                    consentModal: {
                        title: "Koristimo Kolačiće",
                        description: "Zdravo, ova web stranica koristi bitne kolačiće kako bi osigurala pravilan rad i kolačiće za praćenje kako bi se razumjela vaša interakcija s njom. Potonje će se postaviti tek nakon pristanka.",
                        acceptAllBtn: "Prihvati",
                        acceptNecessaryBtn: "Odbij",
                        showPreferencesBtn: "Dodatne opcije"
                    },
                    preferencesModal: {
                        title: "Opcije kolačića",
                        acceptAllBtn: "Prihvati sve",
                        acceptNecessaryBtn: "Odbij sve",
                        savePreferencesBtn: "Snimi izmjene",
                        closeIconLabel: "Zatvori",
                        sections: [
                            {
                                title: 'Šta koristimo',
                                description: 'Koristimo kolačiće kako bi osigurali funkcionalnosti web stranice i poboljšali vaše online iskustvo. Za svaku kategoriju možete odabrati da dazvolite/odbijete.'
                            },
                            {
                                title: 'Neophodni kolačići',
                                description: 'Ovi kolačići su neophodni za pravilno funkcioniranje moje web stranice. Bez ovih kolačića, web stranica ne bi radila ispravno',
                                linkedCategory: "necessary"
                            },
                            {
                                title: 'Funkcionalni kolačići',
                                description: 'Ovi kolačići omogućavaju prikaz sadržaja koji se izvorno ne nalazi na nasšem serveru. Tipa YouTube video kao i raznorazni drugi elementei. Bez dozvole ovih kolacčića niste u mogućnosti vidjeti sav sadržaj objava.',
                                linkedCategory: "embed",
                                toggle: {
                                    value: 'embed',
                                    enabled: false,
                                    readonly: false
                                }
                            },
                            {
                                title: 'Marketing kolačići',
                                description: 'Ove kolačiće po našoj web lokaciji postavljaju naši partneri za oglašavanje. Te kompanije ih mogu koristiti za kreiranje profila o vašim interesovanjima i prikazivanje relevantnih oglasa na drugim web lokacijama. Oni funkcioniraju jedinstvenim identificiranjem vašeg preglednika i uređaja. Ako ne dopustite ove kolačiće, nećete imati priliku primati naše ciljano oglašavanje na različitim web lokacijama.\n',
                                linkedCategory: "marketing",
                                toggle: {
                                    value: 'marketing',
                                    enabled: true,
                                    readonly: false
                                }
                            },
                            {
                                title: 'Kolačići performansi i analitike',
                                description: 'Ovi kolačići omogućuju web stranici da zapamti izbore koje ste napravili u prošlosti',
                                linkedCategory: "analytics",
                                cookieTable: {
                                    headers: {
                                        name: "Ime",
                                        domain: "Servis",
                                        description: "Opis",
                                        expiration: "Trajanje"
                                    },
                                    body: [
                                        {
                                            name: "_ga",
                                            domain: "Google Analitika",
                                            description: "Postavljeno od <strong>Google Analitike</strong>",
                                            expiration: "Trajanje 12 dana"
                                        },
                                        {
                                            name: "_gid",
                                            domain: "Google Analitika",
                                            description: "Postavljeno od <strong>Google Analitike</strong>",
                                            expiration: "Sesija"
                                        }
                                    ]
                                }
                            },
                            {
                                title: "Više infomacija",
                                description: "Za više detalja u vezi s kolačićima i drugim osjetljivim podacima, molimo vas pročitajte <a href=\"/pravila-privatnosti\" class=\"cc-link\">pravila privatnosti</a>."
                            }
                        ]
                    }
                }
            }
        }
    }
    const cc = CookieConsent.run(ccOptions)
}


export function initCookieNotice() {

    runCookieNotice();

}