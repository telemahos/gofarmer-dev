# Εδώ θα γράφονται όλα τα προβλήματα και οι λύσεις για το **GoFarmer**
* * *
_11-12-2012_
### ΙΔΕΑ 
Όσον αφορά τις αξιολογήσεις αγροτών και εταιριών, σκέφτηκα έναν τρόπο που δεν προσβάλει κανέναν. Αυτός είναι ο εξής: Όσο μια εταιρία έχει να δείξει ότι συνεργάζεται με αρκετούς παραγωγούς τόσο ανεβαίνει η αξιοπιστία της. Δηλαδή κάποιος που δεν είναι ευχαριστημένος με την συνεργασία που είχε με μια εταιρία απλά δεν θα δηλώνει εύκολα ότι συνεργάστηκε με αυτή την εταιρία, ακόμα και του το ζητήσει αυτή. Επίσης ένας άλλος παράγοντας είναι ότι, κάποιος που θέλει να κλείσει μια συμφωνία με μια εταιρία, μπορεί εύκολα να βρεί άλλους αγρότες που συνεργάζονται με αυτή και να επικοινωνήσει μαζί τους να δει αν όντως είναι καλή η εταιρία αυτή ως προς την συναλλάγή. Έτσι οι συνεργασίες που θα εμφανίζονται σε μια επιχείρηση ή έναν αγρότη θα ανεβάζουν την αξιοπιστία του/της. Με αυτό τον τρόπο οι αγρότες θα μπορούν εύκολα να διακρίνουν ποιες εταιρίες είναι αξιόπιστες και για τις εταιρίες ποιοι παραγωγοί είναι αξιόπιστοι. 
Στην αρχή θα φαίνονται μόνο οι συνεργασίες και στο μέλλον, αφού πρώτα έχουμε δεθεί σαν *GOFARMER* νομικά πολύ καλά θα μπορέσουμε να να βάλουμε και τις αξιολογίσεις για τον καθένα.    
Και αυτός θα είναι ο λόγος που θα δώσει μεγάλη αξία στην ιστοσελίδα, το ότι ο κάθε παραγωγός θα μπορεί να βρείσκει εύκολα  τις αξιόπιστες επιχειρήσεις και οι εταιρίες θα βρίσκουν εύκολα αξιόπιστους παραγωγούς. 
Επίσης πρέπει να δώσω κίνητρα στις εταιρίες να δηλώνουν την συνεργασία με τους παραγωγούς. Π.χ. στην αναζήτηση θα εμφανίζονται πρώτα οι εταιρίες με τους περισσότερους συνεργάτες. Όσο για το πως θα δώσω κίνητρο για την αξιοπιστία των παραγωγών θα το σκεφτώ ακόμη. 

* * *
_08-12-2012_
- *ToDo:*
1. Πως ο χρήστης θα ανεβάσει και θα κόψει την φωτογραφία του!
1.1. Ο χρήστης επιλέγει την φωτογραφία που επιθυμεί και την ανεβάζει.
1.2. Το πρόγραμμα διαβάζει την φωτογραφία, και αν ταιριάζει στα κριτήρια προχωράει στο ανέβασμα της, στον φάκελο img_temp και παράλληλα καταχωρεί στην βάση δεδομένων του χρήστη το όνομα της φωτογραφίας του. Μετά από αυτό τον παραπέμπει (redirect) στην επόμενη σελίδα όπου θα κόωει την φωτογραφία του στις διαστάσεις που έχει θέσει το *GoFarmer* .
1.3. Στην επόμενη οθόνη ο χρήστης βλέπει την φωτογραφία που έχει ανεβάσει και ότι έχει την δυνατότητα να την κόψει στις διαστάσεις που επιθυμεί. Εδώ το πρόγραμμα πρέπει να διαβάσει από την βάση δεδομένων το όνομα της φωτογραφίας. Και μετά να δημιουργίσει δυο άλλες φωτογραφίες. Μια μεγάλων διαστάσεων 270x202 και μια άλλη άγνωστων ακόμα αλλά πολύ μικρότερων διαστάσεων. 
1.4. Στη συνέχεια η παλιά φωτογραφία που είναι αποθηκευμένη στον φάκελο img_temp θα πρέπει να διαγραφεί. 
1.5. Αφού πραγματοποιηθούν τα παραπάνω χωρίς προβλήματα, ο χρήστης παραπέμπεται στην επόμενη οθόνη που είναι η αρχική σελίδα του *GoFarmer*.

* * *
Δυστυχώς μόνο το Firefox ξάνει σωστή δουλειά. Οι άλλοι δεν επιλέγουν την σωστή περιοχή που επιλέγω. Πρέπει να βρω λύση για αυτό. 
Το πρόβλημα που εντόπισα είναι σε εικόνες μεγαλύτερες του πεδίου που εμφανίζονται, ας πούμε πάνω από 600 πιξελ. Εκεί όταν η εικόνα είναι μέχρι 500 πίξελ, δεν υπάρχει κανένα πρόβλημα σε κανέναν περιηγητή, αλλά οι μεγάλες φωτογραφίες δεν εστιάζουν σωστά την επιλεγμένη περιοχή.
* * *
*ToDo*
1. Πρέπει επίσης να γίνει όλη η παραπάνω διαδικασία μέσω *Modal* για ενημέρωση της φωτογραφίας, απευθείας μέσω του ΠΡΟΦΙΛ.
2. Να ετοιμάσω το *Wizard για τις εταιρίες*. 
2.1. Οι εταιρίες πρέπει να δηλώσουν τα στοιχεία της εταιρίας, όπως α) Όνομα Εταιρίας, β) Περιγραφή εταιρίας, γ) Περιοχή, δ) Πόλη.
2.2. Οι εταιρίες πρέπει να δηλώσουν πια προϊόντα εμπορεύονται. Θα πρέπει να υπάρχει ένα **MultiselectBox** από το οποίο θα επιλέγουν όλα τα προϊόντα τους.
2.3. Το επόμενο βήμα είναι να κάνουν μια **ζήτηση** αγροτικών προϊόντων, ανάλογα με τη ανάγκη των προϊόντων που θέλουν. Στη δημιουργία ζήτησης θα πρέπει να έχουν την δυνατότητα να περισσότερες από μια ζητήσεις προϊότων.
3. Πρέπει να δημιουργήσω ένα *Module Keywords*.
3.1. Οι λέξεις κλειδιά θα πρέπει να δημιουργούνται αυτόματα.
3.2. Θα πρέπει να δημιουργούνται από τα εξής:
- Περιοχή
- Πόλη
- Προϊόντα (κατά την προσφορά, ζήτηση, αναζήτηση)
- Ποικιλίες αγροτικών προϊόντων
- Κατηγορίες προϊόντων
- Από τις κατηγορίες των ερωτήσεων.
- Ίσως και να φτιάξω ένα **Widget** με το οποίο ο χρήστης θε έχει την δυνατότητα να προσθέτει και να αφαιρεί λέξεις κλειδιά.
4. Το επόμενο βήμα είναι να κάνω τα *Notifications*. 
4.1. Αυτά πρέπει να δημιουργούνται αυτόματα σε συνδυασμό με τις λέξεις κλειδιά και με τις κινήσεις των χρηστών.
4.1.2. Αν εγγραφή κάποιος χρήστης ως παραγωγός και δηλώσει π.χ. ροδάκινα, όλες οι εταιρίες που εμπορεύονται ή ζητούν ροδάκινα θα πρέπει να ειδοποιούνται αυτόματα. Το ίδιο και αν μια εταιρία κάνει μια ζήτηση ροδακίνων, όλοι οι αγρότες που έχουν δηλώσει ότι καλλιεργούν ροδάκινα ή έχουν κάνει προσφορά ροδάκινα θα ενημερώνονται αυτόματα. Το ίδιο μπορεί να γίνει και με τις ερωτήσεις. Αν κάνει κάποιος μια ερώτηση σχετικά με τα ροδάκινα θα μπορούσαν όλοι οι αγρότες που καλλιεργούν ροδάκινα να ειδοποιούνται. Ίσως και οι εταιρίες που τα εμπορεύονται. Το ίδιο ισχύει και για το Blog, τις εκδηλώσεις, Tweets κ.λ.π.
5. Άλλο που πρέπει να γίνει είναι η *Αναζήτηση*
* * *
### Δευτερέυοντα
6. Ένα άλλο που πρέπει να γίνει είναι *Module Widget*. Αλλά είναι δευτερεύων.
6.1. Αυτό θα αποτελείται από τα εξής στοιχεία:
- Προτινόμενοι χρήστες
- Προτινόμενες εταιρίες
- Προτινόμενες ερωτήσεις
- Προτινόμενες αγγελίες
- Προτινόμενες ομάδες
- Προτινόμενες εκδηλώσεις
6.2. Οι προτιμήσεις θα γίνονται σύμφωνα με τις λέξεις κλειδιά που έχει δημιουργήσει από την δραστηριότητα κάθε χρήστης. Θα φτιαχτεί ο ανάλογος αλγόριθμος που θα το υπολογίζει αυτόματα για κάθε χρήστη. 
7. Άλλο που πρέπει να γίνει είναι *Αγγελίες*
7.1. Κάθε χρήστης έχει το δικαίωμα να δημιουργήσει και να δημοσιεύσει Αγγελίες, πάντα σχετιζόμενες με τις υπάρχουσες κατηγορίες.
8. Άλλο που πρέπει να γίνει είναι *Ομάδες*
8.1. Κάθε χρήστης θα μπορεί να δημιουργεί και να συμμετέχει σε ομάδες.
9. Άλλο που πρέπει να γίνει είναι *Εκδηλώσεις*
9.1. Κάθε χρήστης θα έχει το δικαίωμα να δημιουργεί εκδηλώσεις και να προσκαλεί όποια μέλη θέλει. Όπως επίσης και να συμμετέχει σε όποια εκδήλωση θέλει.
10. Άλλο που πρέπει να γίνει είναι *Blog*
10.1. Κάθε χρήστης θα έχει το δικαίωμα να δηλώσει ότι θέλει να δημοσιεύει άρθρα στο *GoFarmer* και θα του δίνεται η απαραίτητη πρόσβαση για να το κάνει. 
11. Άλλο που πρέπει να γίνει είναι *Το ημερολόγιο του παραγωγού*
11.1. Κάθε εργασία που κάνει κάποιος παραγωγός σε μια από τις καλλιέργειές του θα μπορούσε να τις κοινοποιήσει στο *GoFarmer* και στη συνέχεια στο *Facebook* και *Twitter*.
12. Άλλο που πρέπει να γίνει είναι *Tweets*
12.1. Κάθε χρήστης στο *GoFarmer* έχει την δυνατότητα να γράφει ότι θέλει στο Προφίλ του.
13. Άλλο που πρεπει να γίνει είναι το *Recommendations*
13.1. Κάθε παραγωγός μπορεί να αξιολογεί την επιχείρηση με την οποία έχει κάποια συνεργασία. Ίσως και οι εταιρίες με την σειρά τους να μπορούν να κάνουν αξιολογίσεις στους συνεργαζόμενους παραγωγούς. Αυτό που δεν έχω καταλήξει ακόμα είναι αν αυτοί που δέχονται τις αξιολογίσεις έχουν κάποια δυνατότητα να δέχονται ή όχι τις αξιολογίσεις. Στο Ebay δεν τις ελέγχουν. Στο Linkedin ελέγχεται.  
14. Οι αγρότες μπορούν να δηλώσουν ότι *συνεργάζονται/συνεργάστηκαν* με κάποια εταιρία. Μπορεί να γίνετε αίτημα και η επιχείρηση να το δέχετε ή να το απορήπτει. Το αντίστροφο μπορεί να γίνεται και με τις εταιρίες και να στέλνουν αιτήματα στους παραγωγούς και αυτοί να το δέχονται ή να το απορίπτουν. Αφού γίνει δεκτό το αίτημα τότε μπορούν να κάνουν αξιολογίσεις ο ένας στον άλλο.
 




- Το πρόβλημα για σήμερα είναι πως όταν αποθηκεύω μια εικόνα, μετά παραπέμπεται στην επόμενη οθόνη όπου έχω την δυνατότητα να κόψω αυτή την εικόνα στις διαστάσεις που θέλω. Για να γίνει αυτό πρέπει το *Jcrop* να βλέπει την ίδια εικόνα με αυτή που επεξεργάζομαι. Δυστυχώς αυτό δεν γίνετε. 