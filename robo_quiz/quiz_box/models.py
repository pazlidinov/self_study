from django.db import models
from django_quill.fields import QuillField
# Create your models here.


class Quiz(models.Model):
    name = models.CharField(max_length=250)
    slug = models.SlugField(max_length=250)
    description = QuillField()
    question_count=models.PositiveIntegerField(default=0)
    time = models.TimeField(blank=True, null=True)
    image = models.ImageField(upload_to='quiz_images/', blank=True, null=True)

   
    def __str__(self):
        return str(self.name)


class Question(models.Model):
    label = models.CharField(max_length=250)
    order = models.PositiveIntegerField(blank=True, null=True)
    point = models.PositiveIntegerField(default=1)
    image = models.ImageField(
        upload_to='quuestion_image/', blank=True, null=True)
    quiz = models.ForeignKey(
        Quiz, on_delete=models.CASCADE, related_name='questions')

    def __str__(self):
        return str(self.label)


class Answer(models.Model):
    text = models.TextField(max_length=150)
    is_correct = models.BooleanField(default=False)
    question = models.ForeignKey(
        Question, on_delete=models.CASCADE, related_name='answers')

    def __str__(self):
        return str(self.text)
