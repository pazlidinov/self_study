from uzwords import words
from difflib import get_close_matches


def check_word(word, words=words):
    word = word.lower()
    matches = set(get_close_matches(word, words))
    avialable = False
    if word in matches:
        avialable = True
        matches = word
    
    return {'avialable': avialable, 'matches': matches}


